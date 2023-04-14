<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'grade_id',
        'classroom_id',
        'name',

    ];
    public function rules($id = 0)
    {
        return
        [
        'grade_id'=>'required|int|exist:grades,id',
        'classroom_id'=>'required|int|exist:classrooms,id',
        'name' => "required|string|min:3|max:255",
        ];
    }
    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id','id');
    }
    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id','id');
    }
}
