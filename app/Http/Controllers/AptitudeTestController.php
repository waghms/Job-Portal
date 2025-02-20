<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\AptitudeTestResult;
use Illuminate\Support\Collection;
use App\Models\Job;
use App\Models\Question;
use App\Models\Application;
use Illuminate\Http\Request;

class AptitudeTestController extends Controller
{
    // Show Test Rules
    public function showRules($job_id)
    {
        // Check if job_id is valid
        $application = Application::where('user_id', auth()->id())->where('job_id', $job_id)->first();
        
        // If no application found for this user and job, handle the error
        if (!$application) {
            return redirect()->route('jobs.index')->with('error', 'You must apply for this job before accessing the test.');
        }

        // Pass the job_id to the view
        return view('aptitude-test.rules', compact('job_id'));
    }

    // Start the Test (show questions and timer)
    public function startTest($job_id)
    {
        // Check if job_id is valid
        $application = Application::where('user_id', auth()->id())->where('job_id', $job_id)->first();
        
        // If no application found for this user and job, handle the error
        if (!$application) {
            return redirect()->route('jobs.index')->with('error', 'You must apply for this job before accessing the test.');
        }

        // Define the question types
        $questionTypes = ['Reasoning', 'Logical', 'Quantitative', 'Verbal', 'Data Interpretation'];

        // Initialize an empty collection to hold the questions
        $questions = collect();  // Initialize as a collection, not an array

        // Loop through each question type and fetch 4 random questions
        foreach ($questionTypes as $type) {
            $typeQuestions = Question::where('type', $type)->inRandomOrder()->take(4)->get();
            $questions = $questions->merge($typeQuestions);  // Use merge() on the collection
        }

        // Shuffle the questions randomly to mix them
        $questions = $questions->shuffle();

        // Pass job_id along with the questions to the view
        return view('aptitude-test.start', compact('questions', 'job_id'));
    }

    // Submit the Test and show results
    public function submitTest(Request $request, $job_id)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to submit the test.');
        }

        // Validate answers to ensure they are not empty
        $request->validate([
            'answers' => 'required|array', // Ensure answers are an array
        ]);

        $userAnswers = $request->input('answers');
        $correctAnswers = 0;
        $totalMarks = 0;

        // Calculate the score
        foreach ($userAnswers as $questionId => $userAnswer) {
            $question = Question::find($questionId);
            if ($question && $question->correct_answer == $userAnswer) {
                $correctAnswers++;
                $totalMarks += 5; // Each correct answer gives 05 marks
            }
        }

        // Ensure that the user has applied for the job
        $application = Application::where('user_id', auth()->id())->where('job_id', $job_id)->first();
        
        // If no application exists for the user and job, handle the error appropriately
        if (!$application) {
            return redirect()->route('jobs.index')->with('error', 'You must apply for this job before submitting the test.');
        }

        // Store the result in the aptitude_test_results table
        AptitudeTestResult::create([
            'user_id' => auth()->id(),  // Assuming user is logged in
            'job_id' => $job_id,        // Use the job_id retrieved from the application
            'completed_at' => now(),
            'total_marks' => $totalMarks,
            'correct_answers' => $correctAnswers,
            'status' => 'completed',
        ]);

        // Update the marks in the applications table
        $application->marks = $totalMarks;
        $application->save();


        // Return the result to the view
        return view('aptitude-test.result', compact('totalMarks', 'correctAnswers', 'job_id'));
    }
}
