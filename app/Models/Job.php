<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'postname',
        'company_name',
        'location',
        'salary',
        'experience',
        'job_type',
        'category', // This is the foreign key column that references categories table
        'last_date',
        'skills',
        'educational_requirements',
        'responsibility',
        'logo',
        'vacancy',
    ];

    
    // A Job belongs to a Category.
     
    public function category()
    {
        return $this->belongsTo(Category::class, 'category'); // Link to category model using 'category' column
    }
}
