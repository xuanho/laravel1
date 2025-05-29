<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

use Arr;

class Job extends Model {
    use HasFactory;
    protected $table = 'job_listing';
    protected $fillable = [
        'title',
        'company',
        'location',
        'salary',
    ];
    public function employer(){
        return $this->belongsTo(Employer::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }
    
    // public static function find($id) {
    //     $jobs = self::all();
    //     $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
    //     // $job = collect($jobs)->filter(fn($job) => $job['salary'] == 10)->map(function($job){
    //     //     $job['salary'] = $job['salary'] * 2;
    //     //     return $job;
    //     // });

    //     if (!$job) {
    //         abort(404);
    //     }
    //     return $job;
    // }
}