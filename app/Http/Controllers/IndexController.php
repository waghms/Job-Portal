<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {   
        $categories = [
            'Marketing',
            'Customer Service',
            'Human Resource',
            'Project Management',
            'Business Development',
            'Sales & Communication',
            'Design & Creative',
            'Others',
        ];

        $vacancyCounts = [];
        foreach ($categories as $category) {
            $vacancyCounts[$category] = Job::where('category', $category)->sum('vacancy');
        }

        // Pass Jobs with uppercase 'J'
        $Jobs = Job::paginate(5);  // You can change the number based on your requirement.

        return view('index', compact('vacancyCounts', 'Jobs'));
    }

}
