<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});
Route::get('/jobs/create', function(){
    return view('jobs.create');
});
Route::get('/jobs', function () {
    // $job = Job::all(); // lazy loading
    $job = Job::with('employer')
    ->latest() // equivalent to orderBy('id', 'desc')
    // ->orderBy('id', 'desc') 
    ->paginate(10); // eager loading
    // $job = Job::with('employer')->cursorPaginate(5); // eager loading
    return view('jobs.index', ['jobs' => $job]);
});
Route::get('/jobs/{id}', function ($id) {
    return view('jobs.show', ['job' => Job::find($id)]);
});
Route::get('/contact', function () {
    return view('contact');
});
 Route::post('/jobs', function(){
    request()->validate([
        'title' => 'required|min:3|max:255',
        'salary' => 'required|numeric|min:0',
    ]);
    Job::create([
        'title' => request('title'),
        'employer_id' => 1,
        'company' => 'compay A',
        'location' => 'Texas',
        'salary' => request('salary'),
    ]);
    return redirect('/jobs')->with('success', 'Job created successfully!');
 });