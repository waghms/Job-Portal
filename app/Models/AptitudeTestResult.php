<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AptitudeTestResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_id',
        'completed_at',
        'total_marks',
        'correct_answers',
        'status',
    ];

    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class); // assuming the User model exists
    }

    public function job()
    {
        return $this->belongsTo(Job::class); // assuming the Job model exists
    }
}
