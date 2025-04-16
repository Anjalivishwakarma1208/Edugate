<?php

namespace App\Http\Controllers;

use App\Models\SemesterMaster;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemesterMasterController extends Controller
{
    public function index()
{
    $semester = SemesterMaster::join('courses', 'semester_master.course_id', '=', 'courses.id')
        ->select('semester_master.id', 'semester_master.semester_number', 'semester_master.status', 'courses.course_name')
        ->get();
    
    return view('semester.index', compact('semester'));
}

    

    public function create()
    {
        $courses = Course::all();
        return view('semester.create', compact('courses'));
    }

    public function store(Request $request)
{
    try {
        // Validate request data
        $validatedData = $request->validate([
            'semester_number' => 'required|integer',
            'course_id' => 'required|exists:courses,id',
            'status' => 'required|integer',
            'created_on' => 'nullable|date', // Make this nullable if not always provided
            'updated_on' => 'nullable|date', // Make this nullable if not always provided
        ]);

        // Set default values if not provided
        $createdOn = $validatedData['created_on'] ?? now(); // Use current time if not provided
        $updatedOn = $validatedData['updated_on'] ?? now(); // Use current time if not provided

        // Insert data into semester_master table
        $inserted = DB::table('semester_master')->insert([
            'semester_number' => $validatedData['semester_number'],
            'course_id' => $validatedData['course_id'],
            'status' => $validatedData['status'],
            'created_on' => $createdOn,
            'updated_on' => $updatedOn,
        ]);

        if (!$inserted) {
            return redirect()->route('semester.index')->with('error', 'Error creating semester.');
        }

        return redirect()->route('semester.index')->with('success', 'Semester created successfully.');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->route('semester.index')->with('error', 'Database error occurred while creating semester.');
    } catch (\Exception $e) {
        return redirect()->route('semester.index')->with('error', 'An error occurred while creating semester.');
    }
}

public function show($id)
{
    $semester = SemesterMaster::with('course')->findOrFail($id); // Eager load the relationship
    return view('semester.show', compact('semester'));
}

    // In your controller method for showing or updating the semester
// Method to show the edit form
public function edit($id)
{
    $semester = SemesterMaster::findOrFail($id); // Use 'id' here
    $courses = Course::all(); // Assuming you have a Course model
    return view('semester.edit', compact('semester', 'courses'));
}

// Method to update the semester
public function update(Request $request, $id)
{
    $semester = SemesterMaster::findOrFail($id); // Use 'id' here
    $semester->course = $request->input('course');
    $semester->semester_number = $request->input('semester_number');
    $semester->status = $request->input('status');
    $semester->save();
    
    return redirect()->route('semester.index')->with('success', 'Semester updated successfully.');
}


    public function destroy($id)
    {
        $semester = SemesterMaster::findOrFail($id);
        $semester->delete();
        return redirect()->route('semester.index')
            ->with('success', 'Semester deleted successfully.');
    }
}
