<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'studant_id',

        'schoolgrade_id',
        'classroom_id',
        'section_id',

        'to_schoolgrade_id',
        'to_classroom_id',
        'to_section_id',

    ];
    public static function rules($id = 0)
    {
        return [
            'studant_id' => 'required|int|exists:studants,id',

            'schoolgrade_id' => 'required|int|exists:schoolgrades,id',
            'classroom_id' => 'required|int|exists:classrooms,id',
            'section_id' => 'required|int|exists:sections,id',

            'to_schoolgrade_id' => 'required|int|exists:schoolgrades,id',
            'to_classroom_id' => 'required|int|exists:classrooms,id',
            'to_section_id' => 'required|int|exists:sections,id',
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
    public function to_schoolgrade()
    {
        return $this->belongsTo(Schoolgrade::class, 'to_schoolgrade_id', 'id');
    }
    public function to_classroom()
    {
        return $this->belongsTo(Classroom::class, 'to_classroom_id', 'id');
    }
    public function to_section()
    {
        return $this->belongsTo(Section::class, 'to_section_id', 'id');
    }
    public function studant()
    {
        return $this->belongsTo(Studant::class, 'studant_id', 'id');
    }


}
