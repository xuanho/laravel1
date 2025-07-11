<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job; // Import the Job model

class JobController extends Controller
{
    public function index()
    {
         // $job = Job::all(); // lazy loading
       $job = Job::with('employer')
        ->latest() // equivalent to orderBy('id', 'desc')
        // ->orderBy('id', 'desc') 
        ->paginate(10); // eager loading
        // $job = Job::with('employer')->cursorPaginate(5); // eager loading
        return view('jobs.index', ['jobs' => $job]);
    }
    public function create()
    {
         return view('jobs.create');
        
    }
    public function show(Job $job){
        dump($job);
         return view('jobs.show', ['job' => $job]);

    }
    public function store(){
         request()->validate([
        'title' => 'required|min:3|max:255',
        'salary' => 'required|min:0',
        ]);
        Job::create([
            'title' => request('title'),
            'employer_id' => 1,
            'company' => 'compay A',
            'location' => 'Texas',
            'salary' => request('salary'),
        ]);
        return redirect('/jobs')->with('success', 'Job created successfully!');

    }
    public function edit(Job $job)
    {
         return view('jobs.edit', ['job' => $job]);
        
    }
    public function update(Job $job) 
    {
         // validate the request
        request()->validate([
            'title' => 'required|min:3|max:255',
            'salary' => 'required|min:0',
        ]);
        // authourize

        // update the job
        // $job->title = request('title');
        // $job->salary = request('salary');
        // $job->save();
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        // and persist it
        // redirect to the job page
        return redirect('/jobs/'.$job->id)
            ->with('success', 'Job updated successfully!');
            
    }
    public function destroy(Job $job)
    {      
         // find and delete the job 
        $job->delete();
        // redirect to the jobs page
        return redirect('/jobs')
            ->with('success', 'Job deleted successfully!');
        }
}

