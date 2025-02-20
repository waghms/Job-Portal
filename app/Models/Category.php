<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Assuming 'name' column for category name

    /**
     * A Category has many jobs.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class, 'category'); // Link to the jobs table using the 'category' column
    }
}

