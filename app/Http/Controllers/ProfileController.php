<?php
// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Show the user's profile (view)
    public function show()
    {
        $profile = Profile::where('user_id', auth()->user()->id)->first();
        
        if (!$profile) {
            return redirect()->route('user.profile.create')->with('message', 'You need to create your profile first.');
        }

        return view('profile.show', compact('profile'));
    }

    // Show the profile creation form
    public function create()
    {
        return view('profile.create');
    }

    // Store the profile in the database
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'dob' => 'required|date',
            'email' => 'required|email',
            'gender' => 'required|in:Male,Female,Other',
            'address' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'district' => 'required|string',
            'pincode' => 'required|string',
            'contact_no' => 'required|string',
            'pancard_no' => 'required|string',
            'ssc_highschool_name' => 'required|string',
            'ssc_percentage' => 'required|numeric|min:0|max:100',
            'ssc_passout_year' => 'required|integer',
            'hsc_college_name' => 'required|string',
            'hsc_percentage' => 'required|numeric|min:0|max:100',
            'hsc_passout_year' => 'required|integer',
            'graduation_college_name' => 'required|string',
            'graduation_percentage' => 'required|numeric|min:0|max:100',
            'graduation_passout_year' => 'required|integer',
            'skills' => 'required|string',
            'company_name' => 'required|string',
            'work_experience' => 'required|string',
            'location' => 'required|string',
            'postname'=> 'required|string',
            'profilephoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profilephoto')) {
            $path = $request->file('profilephoto')->store('profile_photos', 'public');
        }

        Profile::create([
            'user_id' => auth()->user()->id,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'dob' => $request->dob,
            'email' => $request->email,
            'gender' => $request->gender,
            'address' => $request->address,
            'country' => $request->country,
            'state' => $request->state,
            'district' => $request->district,
            'pincode' => $request->pincode,
            'contact_no' => $request->contact_no,
            'pancard_no' => $request->pancard_no,
            'ssc_highschool_name' => $request->ssc_highschool_name,
            'ssc_percentage' => $request->ssc_percentage,
            'ssc_passout_year' => $request->ssc_passout_year,
            'hsc_college_name' => $request->hsc_college_name,
            'hsc_percentage' => $request->hsc_percentage,
            'hsc_passout_year' => $request->hsc_passout_year,
            'graduation_college_name' => $request->graduation_college_name,
            'graduation_percentage' => $request->graduation_percentage,
            'graduation_passout_year' => $request->graduation_passout_year,
            'skills' => $request->skills,
            'company_name' => $request->company_name,
            'work_experience' => $request->work_experience,
            'location' => $request->location,
            'postname' => $request->postname,
            'profilephoto' => isset($path) ? $path : null,
        ]);

        return redirect()->route('user.profile.show')->with('message', 'Profile created successfully!');
    }

    // Show the profile edit form
    public function edit($id)
    {
        $profile = Profile::where('user_id', auth()->user()->id)->findOrFail($id);
        return view('profile.edit', compact('profile'));
    }

    // Update the profile in the database
    public function update(Request $request, $id)
    {
        $profile = Profile::where('user_id', auth()->user()->id)->findOrFail($id);

        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'dob' => 'required|date',
            'email' => 'required|email',
            'gender' => 'required|in:Male,Female,Other',
            'address' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'district' => 'required|string',
            'pincode' => 'required|string',
            'contact_no' => 'required|string',
            'pancard_no' => 'required|string',
            'ssc_highschool_name' => 'required|string',
            'ssc_percentage' => 'required|numeric|min:0|max:100',
            'ssc_passout_year' => 'required|integer',
            'hsc_college_name' => 'required|string',
            'hsc_percentage' => 'required|numeric|min:0|max:100',
            'hsc_passout_year' => 'required|integer',
            'graduation_college_name' => 'required|string',
            'graduation_percentage' => 'required|numeric|min:0|max:100',
            'graduation_passout_year' => 'required|integer',
            'skills' => 'required|string',
            'company_name' => 'required|string',
            'work_experience' => 'required|string',
            'location' => 'required|string',
            'postname'=> 'required|string',
            'profilephoto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profilephoto')) {
            $path = $request->file('profilephoto')->store('profile_photos', 'public');
            if ($profile->profilephoto) {
                Storage::delete('public/' . $profile->profilephoto);
            }
            $profile->profilephoto = $path;
        }

        $profile->update($request->all());

        return redirect()->route('user.profile.show')->with('message', 'Profile updated successfully!');
    }
}