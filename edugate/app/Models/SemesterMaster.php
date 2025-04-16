<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterMaster extends Model
{
    use HasFactory;

    // Table associated with the model
    protected $table = 'semester_master';

    // Primary key for the model
    protected $primaryKey = 'id'; // Change from 'sem_id' to 'id'

    // Timestamps for the model
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';

    // Fields that are mass assignable
    protected $fillable = [
        'semester_number',
        'course_id',
        'status',
        'created_on',
        'updated_on',
    ];

    // Relationships
    public function subjectMasters()
    {
        return $this->hasMany(SubjectMaster::class, 'sem_id', 'id'); // Update the foreign key to 'id'
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id'); // No change needed here
    }
    
    public function subjectPdfs()
    {
        return $this->hasMany(SubjectPdf::class, 'sem_id', 'id'); // Update the foreign key to 'id'
    }
}
