<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $primaryKey = 'id'; // Change this if your primary key is named differently
    public $timestamps = false; // If you are not using Laravel's default timestamps
    protected $fillable = [
        'course',
        'course_name',
        'description',
        'image',
        'status',
        // 'created_on',
        'updated_on',
        'created_by',
    ];
    public function semesters()
{
    // Correct the foreign key and local key
    return $this->hasMany(SemesterMaster::class, 'course_id', 'id');
}

    public function subjectMasters()
    {
        return $this->hasMany(SubjectMaster::class,'course','course');
    }

    public function subjectPdfs()
    {
        return $this->hasMany(SubjectPdf::class, 'course', 'course');
    }

}
