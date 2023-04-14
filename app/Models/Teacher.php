<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'specialization_id',
        'name',
        'email',
        'password',
        'gender',
        'address',
        'joiningDate',
    ];
    public static function rules($id = 0){
        return[
            'specialization_id'=>['nullable','int','exists:specializations,id'],
            'name'=>['required','string','min:3','max:255'],
            'email'=>['required','email','string',"unique:teachers,email,$id"],
            'password'=>['required','string','min:6','max:10'],
            'gender'=>['required','in:male,female'],
            'address'=>['nullable','string'],
            'joiningDate'=>['nullable','string'],
        ];
    }
    public function specialization(){
        return $this->belongsTo(Specialization::class,'specialization_id','id');
    }
}
