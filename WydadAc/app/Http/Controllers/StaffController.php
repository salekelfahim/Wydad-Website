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

    public function update(StaffRequest $request, $id)
    {

        $staff = Staff::findOrfail($id);

        if (!$staff) {
            return redirect()->back()->with('error', 'Staff not found.');
        }

        $staff->firstname = $request->firstname;
        $staff->lastname = $request->lastname;
        $staff->birthday = $request->birthday;
        $staff->nationality = $request->nationality;
        $staff->mission = $request->mission;

        if ($request->hasFile('picture')) {
            $staff->picture = $request->file('picture')->store('images', 'public');
        }

        $staff->save();

        return redirect()->back()->with('success', 'Staff updated successfully.');
    }

   
}
