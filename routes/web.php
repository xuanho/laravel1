<?php

use App\Http\Controllers\JobController;
use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
// Route::controller(JobController::class)->group(function () {
//     // index page
//     Route::get('/jobs', 'index');
//     // create page
//     Route::get('/jobs/create', 'create');
//     // show page
//     Route::get('/jobs/{job}', 'show');
//     // store job
//     Route::post('/jobs', 'store');
//     // edit job
//     Route::get('/jobs/{job}/edit', 'edit');
//     // update page
//     Route::patch('/jobs/{job}', 'update');
//     // delete job
//     Route::delete('/jobs/{job}', 'destroy');
// });
Route::resource('jobs', JobController::class);
Route::view('/contact', 'contact')->name('contact');
// // create page
// Route::get('/jobs/create', [JobController::class, 'create']);
// // index page
// Route::get('/jobs', [JobController::class, 'index']);
// // show page
// Route::get('/jobs/{job}', [JobController::class, 'show']);
// // store job
// Route::post('/jobs', [JobController::class, 'store']);
// // edit job
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
// // update page
// Route::patch('/jobs/{job}', [JobController::class, 'update']);
// // delete job
// Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

