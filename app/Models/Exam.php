<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'schoolgrade_id',
        'classroom_id',
        'section_id',
        'teacher_id',
        'name',
        'section_id',
        'subject_id'
    ];
    public static function rules($id = 0)
    {
        return [
            'schoolgrade_id' => 'required|int|exists:schoolgrades,id',
            'classroom_id' => 'required|int|exists:classrooms,id',
            'section_id' => 'required|int|exists:sections,id',
            'teacher_id' => 'required|int|exists:teachers,id',
            'section_id' => 'required|int|exists:sections,id',
            'subject_id' => 'required|int|exists:subjects,id',
            'name' => ['required', 'string',  "unique:exams,email,$id"],

        ];
    }
    public function schoolgrade()
    {
        return $this->belongsTo(Schoolgrade::class, 'schoolgrade_id', 'id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id', 'id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

}

