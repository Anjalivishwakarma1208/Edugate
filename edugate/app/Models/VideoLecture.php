<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class VideoLecture extends Model

{
    use HasRoles;

    use HasFactory;

    protected $fillable = [
        'sub_id',
        'title',
        'status',
        'video_file_name',
        'created_on',
        'created_by',
        
    ];

    protected $dates = ['created_on'];    protected $table = 'video_lectures'; // Table name
    protected $primaryKey = 'video_id'; // Primary key column

    public $incrementing = false; // Set to false if `video_id` is not auto-incrementing
    protected $keyType = 'string'; // Set to 'int' if it’s an integer


    // Define the relationship with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function subject()
    {
        return $this->belongsTo(SubjectMaster::class, 'sub_id');
    }
    // Optionally, you can define relationships here if needed
    // Example: public function course() { return $this->belongsTo(Course::class); }
}
