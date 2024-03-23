<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function Show()
    {
        return view('admin.addstaff');
    }

    public function AddStaff(StaffRequest $request)
    {
        $picture = $request->file('picture')->store('images', 'public');

        Staff::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'birthday' => $request->input('birthday'),
            'nationality' => $request->input('nationality'),
            'mission' => $request->input('mission'),
            'picture' => $picture,
        ]);

        return back()->with('success', 'Staff Added Successfully!');

    }

    public function getStaff()
    {
        $staffs = Staff::all();

        return view('admin.stafflist', compact('staffs'));
    }

    
}
