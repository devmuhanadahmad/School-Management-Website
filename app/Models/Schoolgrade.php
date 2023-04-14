<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schoolgrade extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'notes',
        'status'
    ];
    public static function rules($id = 0){
        return[
            'name'=>['required','string','min:3','max:255',"unique:schoolgrades,name,$id"],
            'notes'=>['nullable','string'],
            'status'=>['nullable','in:active,inactive'],

        ];
    }
    public function classroom(){
        return $this->hasMany(Classroom::class,'schoolgrade_id','id');
    }
    public function section(){
        return $this->hasMany(Section::class,'grade_id','id');
    }
}
