<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    // Display list of questions with search functionality
    public function index(Request $request)
    {
        // Get the search query from the request (if any)
        $search = $request->input('search');

        // Query the questions, filtering if a search query is provided
        $questions = Question::when($search, function ($query) use ($search) {
            return $query->where('question', 'LIKE', "%$search%")
                ->orWhere('type', 'LIKE', "%$search%")
                ->orWhere('option_a', 'LIKE', "%$search%")
                ->orWhere('option_b', 'LIKE', "%$search%")
                ->orWhere('option_c', 'LIKE', "%$search%")
                ->orWhere('option_d', 'LIKE', "%$search%")
                ->orWhere('correct_answer', 'LIKE', "%$search%");
        })->paginate(10);

        // Return the view with the questions and the search term
        return view('admin.questions.index', compact('questions', 'search'));
    }

    // Show form to create a new question
    public function create()
    {
        return view('admin.questions.create');
    }

    // Store a new question
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|in:Reasoning,Logical,Quantitative,Verbal,Data Interpretation',  // Fixed field name
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|in:a,b,c,d',
        ]);

        Question::create($request->all());
        return redirect()->route('admin.questions.index')->with('success', 'Question created successfully!');
    }

    // Show a specific question
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.questions.show', compact('question'));
    } 

    // Show form to edit a question
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.questions.edit', compact('question'));
    }

    // Update an existing question
    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|in:Reasoning,Logical,Quantitative,Verbal,Data Interpretation',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|in:a,b,c,d',
        ]);

        $question = Question::findOrFail($id);
        $question->update($request->all());
        return redirect()->route('admin.questions.index')->with('success', 'Question updated successfully!');
    }

    // Delete a question
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->route('admin.questions.index')->with('success', 'Question deleted successfully!');
    }
}
