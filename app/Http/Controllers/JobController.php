<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
class JobController extends Controller
{
    // Index
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
            return view('jobs.index', [
                'jobs' => $jobs
            ]);
    }

    // Create
    public function create(){
        return view('jobs.create');
    }
    public function store(Job $job){
        request()->validate([
            'title' => ['required',' min: 3', 'max: 25'],
            'salary'=> ['required'],
        ]);

        $job->create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);
        return redirect('/jobs');
    }
    // Show
    public function show(Job $job)
    {
        return view("jobs.show", ['job' => $job]);
    }

    // Edit
    public function edit(Job $job)
    {
        return view("jobs.edit", ['job' => $job]);
    }

    // Update
    public function update(Job $job)
    {
        // Validate
        request()->validate([
            'title' => ['required',' min: 3', 'max: 25'],
            'salary'=> ['required'],
        ]);
        // Autherize (on held..)

        // Update the job
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        return redirect("/jobs/{$job->id}");
    }

    // Destroy
    public function destroy(Job $job)
    {
        // Autherize (on held..)
        // Delete the job
        $job->delete();
        // redirect to th job page
        return redirect('/jobs');
    }
}
