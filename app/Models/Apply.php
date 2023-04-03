<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'email',
        'current_address',
        'phone_number',
        'education',
        'cv_file',
        'coverletter_file'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
