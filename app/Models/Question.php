<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // Table name if different from the plural of the model
    protected $table = 'questions'; // Optional if your table follows naming conventions

    // Define the fields that are mass assignable
    protected $fillable = [
        'question',
        'type', // Fixed field name to match the database column
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
    ];
}
