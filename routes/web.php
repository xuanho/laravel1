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
    $job = Job::with('employer')->paginate(10); // eager loading
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
    dd('test');
 });