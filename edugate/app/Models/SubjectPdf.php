<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectPdf extends Model
{
    use HasFactory;

    protected $primaryKey = 'pdf_id';

    protected $fillable = [
        'sub_id',
        'file_name',
        'status',
        'created-on',
        'created_by',
        'updated_on',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course', 'course');
    }

    public function semester()
    {
        return $this->belongsTo(SemesterMaster::class, 'sem_id', 'sem_id');
    }

    public function subject()
    {
        return $this->belongsTo(SubjectMaster::class, 'sub_id', 'sub_id');
    }
    
}
