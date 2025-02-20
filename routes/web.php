<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AptitudeTestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Index Page
Route::get('/', function () {
    return view('index');
});

// show job vacancy-count & joblist
Route::get('/', [IndexController::class, 'index'])->name('index');

// Show the contact form
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');

// Handle the form submission
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

// User Routes
Route::get('/user/register', [UserController::class, 'showRegistrationForm'])->name('user.register');
Route::post('/user/register', [UserController::class, 'register'])->name('user.register.submit');
Route::get('/user/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [UserController::class, 'authenticate'])->name('user.login.submit');

// Grouped Routes for Authenticated User
Route::middleware('auth:user')->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');  // Updated to use the controller method
    
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/edit', [UserController::class, 'update'])->name('user.update');

    Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout');

    // Resume upload route (authenticated)
    Route::post('/user/upload-resume', [UserController::class, 'uploadResume'])->name('user.uploadResume');
});

// Admin Routes
Route::get('/admin/register', [AdminController::class, 'showRegistrationForm'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'register'])->name('admin.register.submit');

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.login.submit');

// Grouped Routes for Authenticated Admin
Route::middleware('auth:admin')->group(function () {
    // Admin Dashboard Route (optional)
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
        
    // Admin Profile Edit Routes
    Route::get('/admin/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/edit', [AdminController::class, 'update'])->name('admin.update');

    // Admin Logout Route (Changed to POST for security reasons)
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// Jobs - Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    // Route to show all jobs (index) - accessible by authenticated admins
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

    // Route to show the job creation form - accessible by authenticated admins
    Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');

    // Route to store a new job - accessible by authenticated admins
    Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

    // Route to show a specific job - accessible by authenticated admins
    Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

    // Route to edit a specific job - accessible by authenticated admins
    Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');

    // Route to update a specific job - accessible by authenticated admins
    Route::put('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');

    // Route to delete a job - accessible by authenticated admins
    Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
});


// User Jobs Routes
Route::prefix('user')->name('user.')->middleware('auth:user')->group(function () {
    // Show job details
    Route::get('jobs/{job_id}', [JobController::class, 'pageDetails'])->name('jobs.pageDetails');

    // Route to display the application form
    Route::get('/job/{job_id}/apply', [ApplicationController::class, 'create'])->name('job.apply');

    // Route to submit the application form
    Route::post('/job/{job_id}/apply', [ApplicationController::class, 'store'])->name('user.job.submitApplication');

    // Route to submit the application form for a specific job (user-specific)
    Route::post('/job/{job_id}/apply', [ApplicationController::class, 'store'])->name('job.submitApplication');

    // Route to submit the application form (user-specific) with a specific application ID
    Route::post('/job/{job_id}/apply/{id}', [ApplicationController::class, 'store'])->name('user.job.submitApplication');

});


Route::prefix('user')->middleware('auth:user')->group(function () {
    // Show Profile
    Route::get('profile/show', [ProfileController::class, 'show'])->name('user.profile.show');

    // Show Create Profile page
    Route::get('profile/create', [ProfileController::class, 'create'])->name('user.profile.create');
    
    // Store Profile
    Route::post('profile', [ProfileController::class, 'store'])->name('user.profile.store');
    
    // Show Edit Profile page
    Route::get('profile/edit/{id}', [ProfileController::class, 'edit'])->name('user.profile.edit');

    // Update Profile
    Route::put('profile/update/{id}', [ProfileController::class, 'update'])->name('user.profile.update');

    // Edit Profile Route
    Route::get('/application/{application_id}/edit', [ApplicationController::class, 'edit'])->name('user.application.edit');

    // Update Profile Route
    Route::put('/application/{application_id}', [ApplicationController::class, 'update'])->name('user.application.update');

});


// Route Group
Route::prefix('user')->name('user.')->middleware('auth:user')->group(function () {

    // Define route to show rules with the job_id parameter
    Route::get('/job/{job_id}/apply/aptitude/test/rules', [AptitudeTestController::class, 'showRules'])->name('aptitude.test.rules');
    
    // Route to start the test
    Route::get('/job/{job_id}/apply/aptitude/test/start', [AptitudeTestController::class, 'startTest'])->name('aptitude.test.start');
    
    // Route to submit the test
    Route::post('/job/{job_id}/apply/aptitude/test/submit', [AptitudeTestController::class, 'submitTest'])->name('aptitude.test.submit');

});


// For the login route
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {

    // Display all questions with search functionality
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');

    // Show the form to create a new question
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');

    // Store a new question
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');

    // Show the form to edit a question
    Route::get('/questions/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');

    // Update an existing question
    Route::put('/questions/{id}', [QuestionController::class, 'update'])->name('questions.update');

    // Delete a question
    Route::delete('/questions/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');

    // Show details of a specific question
    Route::get('/questions/{id}', [QuestionController::class, 'show'])->name('questions.show');
});

// User Application Status
Route::middleware(['auth:user'])->group(function () {
    Route::get('applications', [UserController::class, 'showApplications'])->name('user.applications');
});
//Route::get('/user/dashboard', [UserController::class, 'showDashboard'])->name('user.dashboard');


// Admin Dashboard Route
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard')
    ->middleware('auth:admin');

// Route for updating application status (using POST for security)
Route::post('/admin/application/{id}/update-status', [AdminController::class, 'updateApplicationStatus'])
    ->name('admin.updateApplicationStatus')
    ->middleware('auth:admin');

// User Application Status
Route::middleware(['auth:admin'])->group(function () {
Route::get('/admin/applications', [AdminController::class, 'listApplications'])->name('admin.applications.index');
});

// fetch user profile 
Route::middleware(['auth:admin'])->group(function () {
    // Define the route for profile listing
    Route::get('/admin/profiles', [AdminController::class, 'listProfiles'])->name('admin.profiles.index');
});