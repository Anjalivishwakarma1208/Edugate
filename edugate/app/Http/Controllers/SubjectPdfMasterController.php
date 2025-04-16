<?php

namespace App\Http\Controllers;

use App\Models\SubjectMaster; // Use the correct model name for subjects
use App\Models\SubjectPdf;
use App\Models\Course;
use App\Models\SemesterMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class SubjectPdfMasterController extends Controller
{
    public function index()
{
    $subjectPdf = SubjectPdf::all(); // Change $subjects to $subjectPdf
    return view('subject_pdfs.index', compact('subjectPdf')); // Ensure you use 'subjectPdf' here
}


    public function create()
    {
        $courses = Course::all();
        return view('subject_pdfs.create', compact('courses'));
    }

    public function getsemester(Request $request)
    {
        $data['courses'] = Course::get(['course_name', 'course']);
        $data['semester'] = SemesterMaster::where('course', $request->course)
                                          ->get(['semester_number', 'sem_id']);
        return response()->json($data);
    }

    // public function getSubjects(Request $request)
    // {
    //     // Use the SubjectMaster model if it represents subjects in the DB
    //     $subjects = SubjectMaster::where('course_id', $request->course)
    //                              ->where('semester_id', $request->semester)
    //                              ->get(['id', 'subject_name']);

    //     return response()->json(['subjects' => $subjects]);
    // }

    public function store(Request $request)
    {   
       
        $validator = Validator::make($request->all(), [
            // 'sub_id' => 'required',             // Subject ID
            // 'course_id' => 'required',          // Course ID
            // 'sem_id' => 'required',             // Semester ID
            // 'file_name' => 'required|file|mimes:pdf|max:2048', // Validate file type and size
            'status' => 'required|in:0,1',
        ]);
        
        if ($validator->fails()) {
                   

            return redirect()->route('subject_pdfs.create')
                             ->withErrors($validator)
                             ->withInput();
        }
              

        // Save file and get path
        if ($request->hasFile('file_name')) {
            $filePath = $request->file('file_name')->store('subject_pdfs', 'public');
        }

        $subject_pdf = SubjectPdf::create([
            'sub_id' => $request->sub_id,
            'course_id' => $request->course_id,
            'sem_id' => $request->sem_id,
            'file_name' => $filePath ?? '', // Store file path if uploaded
            'status' => $request->status,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => $request->user()->id,
        ]);

        if ($subject_pdf) {
            return redirect()->route('subject_pdfs.index')
                             ->with('success', 'Subject PDF created successfully.');
        } else {
            return redirect()->route('subject_pdfs.create')
                             ->with('error', 'Failed to create subject PDF.')
                             ->withInput();
        }
    }

   
public function get_semester_list($course_id)
    {
        // Fetch semesters using DB facade
        $semesters = DB::table('semester_master')
                       ->join('courses', 'semester_master.course_id', '=', 'courses.id')
                       ->where('semester_master.course_id', $course_id)
                       ->where('semester_master.status', 1) // Filter where status is 1
                       ->select('courses.id','courses.course_name','semester_master.semester_number')
                       ->get();
       
        return view('frontend.semester_list', compact('semesters'));
    } 
public function get_semester_ajax(Request $request)
    {
        $courseId = $request->input('course_id');

        // Fetch semesters with status 1 for the given course ID
        $semesters = DB::table('semester_master')
                       ->where('course_id', $courseId)
                       ->where('status', 1)
                       ->select('id', 'semester_number')
                       ->get();

        return response()->json($semesters);
    }



public function get_subjects_by_ajax(Request $request)
    {
         $courseId = $request->input('course_id');
         $sem_id = $request->input('course_id');
       // dd($request);
        // Fetch semesters with status 1 for the given course ID
        $subjects_list = DB::table('subject_master')
                       ->where('course_id', $courseId)
                       ->where('sem_id', $sem_id)
                       ->where('status', 1)
                       ->select('sub_id', 'name')
                       ->get();
        // Get the raw SQL and bindings for debugging
   
        return response()->json($subjects_list);
}
public function show($id)
{
    // Fetch the subject PDF by ID
    $subjectPdf = SubjectPdf::findOrFail($id);
    
    // Return a view with the subject PDF details
    return view('subject_pdfs.show', compact('subjectPdf'));
}


    // Other CRUD methods like index, edit, update, and destroy can remain similar to the previous implementation
}