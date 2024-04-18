<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\Mission;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function Show()
    {
        $missions = Mission::all();

        return view('admin.addstaff', compact('missions'));
    }

    public function AddStaff(StaffRequest $request)
    {
        $picture = $request->file('picture')->store('images', 'public');

        Staff::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'birthday' => $request->input('birthday'),
            'nationality' => $request->input('nationality'),
            'mission_id' => $request->input('mission'),
            'picture' => $picture,
        ]);

        return back()->with('success', 'Staff Added Successfully!');

    }

    public function getStaff()
    {
        $staffs = Staff::all();
        $missions = Mission::all();

        return view('admin.stafflist', compact('staffs', 'missions'));
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
        $staff->mission_id = $request->mission;

        if ($request->hasFile('picture')) {
            $staff->picture = $request->file('picture')->store('images', 'public');
        }

        $staff->save();

        return redirect()->back()->with('success', 'Staff updated successfully.');
    }

    public function delete($id)
    {
        $staff = Staff::findOrfail($id);

        if (!$staff) {
            return redirect()->back()->with('error', 'Staff not found.');
        }

        $staff->delete();

        return redirect()->back()->with('success', 'Staff deleted successfully.');
    }
}
