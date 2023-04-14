<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'schoolgrade_id',
        'classroom_id',
        'section_id',
        'myparent_id',
        'academic_year',
        'name',
        'price',
        'notes'
    ];
    public static function rules($id = 0)
    {
        return [
            'schoolgrade_id' => 'required|int|exists:schoolgrades,id',
            'classroom_id' => 'required|int|exists:classrooms,id',
            'section_id' => 'required|int|exists:sections,id',
            'academic_year' => ['required', 'string'],
            'name'=>['required','string','min:3','max:255',"unique:classrooms,name,$id"],
            'price' => 'required|int',
            'notes' => 'nullable|string',
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
}
