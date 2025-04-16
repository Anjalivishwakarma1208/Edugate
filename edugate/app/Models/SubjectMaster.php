<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectMaster extends Model
{
    use HasFactory; 

    // Define the table associated with the model
    protected $table = 'subject_master';

    // Define the primary key for the model
    protected $primaryKey = 'sub_id';

    // If the primary key is not an incrementing integer, set this property to false
    public $incrementing = true;

    // Define the data type of the primary key
    protected $keyType = 'int';

    // Specify if the model should be timestamped
    public $timestamps = false;

    // Define the fillable attributes
    protected $fillable = [
        'sem_id',
        'semester',
        'course_id',
        'name',
        'status',
        'created_on',
        'updated_on',
        'created_by',
    ];

    // Define any relationships

    public function semester()
{
    return $this->belongsTo(SemesterMaster::class, 'sem_id', 'id');
}

 public function course() // Change this to 'course' to match your index method
    {
        return $this->belongsTo(Course::class, 'course_id', 'id'); // Assuming 'course_id' is the foreign key in subject_master
    }
public function subjectPdfs()
    {
        return $this->hasMany(SubjectPdf::class, 'sub_id', 'sub_id');
    }
}