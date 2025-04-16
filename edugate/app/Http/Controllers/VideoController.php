<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VideoLecture;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class VideoController extends Controller
{
    public function index()
    {
        $title = "Video Lectures";
        $url = url('/video/');
        $videoLectures = VideoLecture::all();
        $data = compact('url', 'title', 'videoLectures');
        
        return view('video.index')->with($data);
    }

    public function create()
    {
        $title = "Create Video Lecture";
        $url = url('/video');
        $videoLecture = new VideoLecture(); // Initialize an empty video lecture object
        $data = compact('url', 'title', 'videoLecture');

        return view('video.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_id' => 'required|string',
            'title' => 'required|string',
            'video_file_name' => 'nullable|file|mimes:mp4,avi,mkv',
            'status' => 'required|string',
            // Removed 'created_at' from validation
        ]);

        $videoLecture = new VideoLecture();
        $videoLecture->sub_id = $request->input('sub_id');
        $videoLecture->title = $request->input('title');
        // Set created_at automatically (Laravel does this automatically)
        // $videoLecture->created_at = Carbon::now(); // No need to manually set created_at

        if ($request->hasFile('video_file_name')) {
            $file = $request->file('video_file_name');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/videos', $filename);
            $videoLecture->video_file_name = $filename;
        }

        $videoLecture->save();

        return redirect()->route('video.index')->with('success', 'Video lecture created successfully');
    }

    public function show($video_id)
    {
        $videoLecture = VideoLecture::find($video_id);

        if ($videoLecture) {
            return view('video.show', compact('videoLecture'));
        } else {
            return redirect()->route('video.index')->withErrors('Video lecture not found');
        }
    }

    public function edit($video_id)
{
    $videoLecture = VideoLecture::find($video_id);
    
    if ($videoLecture) {
        // Convert 'created_on' to Carbon instance if it's not null
        $videoLecture->created_on = $videoLecture->created_on ? \Carbon\Carbon::parse($videoLecture->created_on) : null;

        return view('video.edit', compact('videoLecture'));
    }

    return redirect()->route('video.index')->withErrors('Video lecture not found');
}


    public function update(Request $request, $video_id)
    {
        $videoLecture = VideoLecture::find($video_id);

        if ($videoLecture) {
            // Validate the input data
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'sub_id' => 'required|string',
                'status' => 'required|string|in:active,inactive',
                'video_file_name' => 'nullable|file|mimes:mp4,avi,mov|max:204800000000', // Adjust file validation rules as needed
            ]);

            // Check if a new file is uploaded
            if ($request->hasFile('video_file_name')) {
                // Delete the old file from storage if it exists
                if ($videoLecture->video_file_name) {
                    $oldFilePath = 'public/videos/' . $videoLecture->video_file_name;
                    Storage::delete($oldFilePath);
                }

                // Store the new file
                $file = $request->file('video_file_name');
                $filePath = $file->store('public/videos');
                $validatedData['video_file_name'] = basename($filePath);
            }

            // Update video lecture record
            $videoLecture->fill($validatedData);
            // No need to manually update 'created_at'
            $videoLecture->save();

            // return redirect()->route('video.show', $videoLecture->id)
            //                  ->with('success', 'Video lecture updated successfully');
        }

        return redirect()->route('video.index')->withErrors('Video lecture not found');
    }

    public function destroy($video_id)
    {
        // Find the video lecture by ID
        $videoLecture = VideoLecture::find($video_id);

        if ($videoLecture) {
            // Delete the file from storage if it exists
            if ($videoLecture->video_file_name) {
                $filePath = 'public/videos/' . $videoLecture->video_file_name;
                Storage::delete($filePath);
            }

            // Delete the video lecture record
            $videoLecture->delete();

            return redirect()->route('video.index')->with('success', 'Video lecture deleted successfully');
        }

        return redirect()->route('video.index')->withErrors('Video lecture not found');
    }
    public function showVideoLectures()
{
    $videoLectures = VideoLecture::all(); // Assuming VideoLecture is your model

    return view('frontend.videolec', compact('videoLectures'));
}


}
