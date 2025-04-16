<?php

namespace App\Http\Controllers;
use App\Models\SubjectMaster;
use App\Models\SemesterMaster;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubjectMasterController extends Controller
{
   
    public function index()
    {
        $subjects = SubjectMaster::with('course')
            ->join('semester_master', 'subject_master.sem_id', '=', 'semester_master.id')
            ->join('courses', 'semester_master.course_id', '=', 'courses.id')
            ->select('subject_master.*', 'courses.course_name','semester_master.semester_number')
            ->get();

        $data['courses'] = Course::select('id', 'course_name')->get();
        return view('subject.index', compact('data', 'subjects'));
    }


    public function create(Request $request)
    {    
        $courses = Course::all();
        return view('subject.create',compact('courses'));
    }

    
    public function get_semester_list($course_id)
        {
            $semesters = DB::table('semester_master')
                        ->join('courses', 'semester_master.course_id', '=', 'courses.id')
                        ->where('semester_master.course_id', $course_id)
                        ->where('semester_master.status', 1) // Filter where status is 1
                        ->select('courses.id','courses.course_name','semester_master.semester_number')
                        ->get();
            return view('frontend.semester_list', compact('semesters'));
        } 

    public function get_subject_list($semester_id)
    {
        $subjects = DB::table('subjects') 
                    ->where('semester_id', $semester_id) 
                    ->where('status', 1) 
                    ->select('id', 'subject_name', 'description')
                    ->get();
        return view('frontend.subject_list', compact('subjects'));
    }
    public function get_semester_ajax(Request $request)
        {

            $courseId = $request->input('course_id');
            $semesters = DB::table('semester_master')
                        ->where('course_id', $courseId)
                        ->where('status', 1)
                        ->select('id', 'semester_number')
                        ->get();

            return response()->json($semesters);
        }

    public function getSubjects(Request $request)
    {
        $subjects = SubjectMaster::where('course_id', $request->course_id)
                                ->where('semester_id', $request->semester_id)
                                ->get(['id', 'subject_name']);

        return response()->json(['subjects' => $subjects]);
    }

    public function getSubjectsAjax(Request $request)
    {
        $subjects = SubjectMaster::all(); 
        return response()->json($subjects);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'course' => 'required',
            'semester' => 'required',
            'subject_name' => 'required|string|max:255',
            'status' => 'required'
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('subject.create')
                ->withErrors($validator)->withInput();
        }
        
        $subject = SubjectMaster::create([
            'course_id' => $request->course,
            'sem_id' => $request->semester,
            'name' => $request->subject_name,
            'status' => $request->status
        ]);

        if ($subject) {
            return redirect()->route('subject.index')
                ->with('success', 'Subject created successfully.');
        } else {
            return redirect()->route('subject.create')
                ->with('error', 'Failed to create subject.')
                ->withInput();
        }
    }

    public function show($sub_id)
    {
        // $subject = SubjectMaster::findOrFail($id);
        $subject = SubjectMaster::with('course', 'semester')->findOrFail($sub_id);
        return view('subject.show', compact('subject'));
        
    }

    
    public function edit($sub_id)
    {  
        $subject = SubjectMaster::findOrFail($sub_id);
        $courses = Course::all();
        $semesters = SemesterMaster::where('course_id', $subject->course_id)->get(); 
        return view('subject.edit', compact('subject', 'courses', 'semesters'));
    }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'course' => 'required', 
        'semester' => 'required', 
        'name' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->route('subject.edit', $request->sub_id) // Use $request->sub_id to redirect
            ->withErrors($validator)
            ->withInput();
    }

    $affectedRows = DB::table('subject_master')
        ->where('sub_id', $request->sub_id) 
        ->update([
            'course_id' => $request->course,
            'sem_id' => $request->semester,
            'name' => $request->name,
            'status' => $request->status
    ]);

    return redirect()->route('subject.index')
        ->with('success', $affectedRows ? 'Subject updated successfully.' : 'No changes made to the subject.');
}


public function destroy(string $id)
{
    $subject = SubjectMaster::findOrFail($id);
    $subject->delete();
    return redirect()->route('subject.index')
            ->with('success', "Subject deleted successfully.");
}

}