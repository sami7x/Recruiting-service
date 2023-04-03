<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable=[
        'job_title',
        'job_category',
        'job_position',
        'job_level',
        'vacancy_no',
        'employment_type',
        'job_location',
        'offered_salary',
        'deadline',
        'education_level',
        'experience',
        'skill',
        'job_description'
    ];

    public function applications()
    {
        return $this->hasMany(Apply::class);
    }

}
