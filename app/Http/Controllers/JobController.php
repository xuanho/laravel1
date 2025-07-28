<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job; // Import the Job model
use App\Models\User;
use Gate;
use Illuminate\Support\Facades\Auth; // Import Auth facade for authentication

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
         return view('jobs.show', ['job' => $job]);

    }
    public function store(){
         request()->validate([
        'title' => 'required|min:3|max:255',
        'salary' => 'required|min:0',
        ], [
            'title.required' => 'The job title is required.',
            'title.min' => 'The job title must be at least 5 characters.',
            'title.max' => 'The job title may not be greater than 255 characters.',
            'salary.required' => 'The salary is required.',
            'salary.min' => 'The salary must be at least 0.',
        ]);
        return redirect('/jobs')->with('success', 'Job created successfully!');

    }
    public function edit(Job $job)
    {
        if(Auth::guest()){
            return redirect('/login')->with('error','You must be logged in to edit a job.');
        }
        // check if the job belongs to the authenticated user
        // Gate::authorize('edit-job', $job); // auto redirects if unauthorized
        // if($job->employer->user->isNot(Auth::user())){
        //     return redirect('/jobs')->with('error', 'You are not authorized to edit this job.');
        // }
        
         // find the job by id
         // $job = Job::find($id);
         // if (!$job) {
         //     abort(404);
         // }
         // dd($job);
         // dump($job->employer->name);
        // dump($job);
         return view('jobs.edit', ['job' => $job]);
        
    }
    public function update(Job $job) 
    {
        Gate::authorize('edit-job', $job); // auto redirects if unauthorized
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
        Gate::authorize('edit-job', $job); // auto redirects if unauthorized
         // find and delete the job 
        $job->delete();
        // redirect to the jobs page
        return redirect('/jobs')
            ->with('success', 'Job deleted successfully!');
        }
}

