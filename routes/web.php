<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});
// Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', [
        'jobs' => $jobs


    ]);
});

Route::get("/contact", function () {
    return view("contact");
});

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show
Route::get("/jobs/{id}", function ($id) {

    $job = Job::find($id);
    return view("jobs.show", ['job' => $job]);
});

// Store
Route::post('jobs', function () {
    request()->validate([
        'title' => ['required',' min: 3', 'max: 25'],
        'salary'=> ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});


// Edit
Route::get("/jobs/{id}/edit", function ($id) {

    $job = Job::find($id);
    return view("jobs.edit", ['job' => $job]);
});

// Update
Route::patch("/jobs/{id}", function ($id) {

    // Validate
    request()->validate([
        'title' => ['required',' min: 3', 'max: 25'],
        'salary'=> ['required'],
    ]);
    // Autherize (on held..)

    // Update the job
    // First method
    // $job = Job::find($id);
    // $job->title = request('title');
    // $job->salary = request('salary');
    // $job->save();

    //Second method
    $job = Job::findOrFail($id);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    // redirect to th job page
    return redirect("/jobs/{$job->id}");
});


// Destroy
Route::delete("/jobs/{id}", function ($id) {
    // Autherize (on held..)
    // Delete the job
    $job = Job::findOrFail($id)->delete();
    // redirect to th job page
    return redirect('/jobs');
});
