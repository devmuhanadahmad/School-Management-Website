<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'schoolgrade_id',
        'classroom_id',
        'teacher_id',
        'name',
    ];
    public static function rules($id = 0)
    {
        return [
            'schoolgrade_id' => 'required|int|exists:schoolgrades,id',
            'classroom_id' => 'required|int|exists:classrooms,id',
            'teacher_id' => 'required|int|exists:teachers,id',
            'name' => ['required', 'string',  "unique:subjects,name,$id"],

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
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}

