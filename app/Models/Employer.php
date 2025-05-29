<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;
    protected $table = 'employers';
    protected $fillable = [
        'name',
    ];
    public function jobs(){
        return $this->hasMany(Job::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }

}
