<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Studant extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'schoolgrade_id',
        'classroom_id',
        'section_id',
        'myparent_id',
        'date_birth',
        'academic_year',
        'name',
        'email',
        'password',
        'gender',
        'address',

    ];
    public static function rules($id = 0)
    {
        return [
            'schoolgrade_id' => 'required|int|exists:schoolgrades,id',
            'classroom_id' => 'required|int|exists:classrooms,id',
            'section_id' => 'required|int|exists:sections,id',
            'myparent_id' => 'required|int|exists:myparents,id',
            'date_birth' => ['nullable', 'string', 'date:format:Y-m-d'],
            'academic_year' => ['nullable', 'string', 'date'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'string', "unique:teachers,email,$id"],
            'password' => ['required', 'string', 'min:6','max:10'],
            'gender' => ['required', 'in:male,female'],
            'address' => ['required', 'string'],

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
    public function myparent()
    {
        return $this->belongsTo(Myparent::class, 'myparent_id', 'id');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
