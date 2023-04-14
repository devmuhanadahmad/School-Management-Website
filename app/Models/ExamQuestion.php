<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_id',
        'title',
        'answer',
        'right_answer',
        'score',

    ];
    public static function rules($id = 0)
    {
        return [
            'exam_id' => 'required|int|exists:exams,id',
            'title' => ['required', 'string'],
            'answer' => ['required', 'string'],
            'right_answer' => ['required', 'string'],
            'score' => ['required', 'int'],

        ];
    }
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }
}





