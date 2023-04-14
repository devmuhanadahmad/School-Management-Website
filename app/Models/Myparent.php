<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Myparent extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'Email',
        'Password',

        'Name_Father',
        'National_ID_Father',
        'Passport_ID_Father',
        'Phone_Father',
        'Language_Father',
        'Nationality_Father_id',
        'Blood_Type_Father_id',
        'Religion_Father_id',
        'Address_Father',

        'Name_Mother',
        'National_ID_Mother',
        'Passport_ID_Mother',
        'Phone_Mother',
        'Language_Mother',
        'Nationality_Mother_id',
        'Blood_Type_Mother_id',
        'Religion_Mother_id',
        'Address_Mother',

        //'file',
        //'currentStep'
    ];
    public static function rules($id = 0){
        return[

            'Email' => ['required', 'email', 'string', "unique:teachers,email,$id"],
            'Password' => ['required', 'string', 'min:6','max:10'],

            'Name_Father' => ['required', 'string', 'min:3', 'max:255'],
            'National_ID_Father'=> ['required','int'],
            'Passport_ID_Father'=> ['required','int'],
            'Phone_Father'=> ['required','int'],
            'Language_Father'=> ['required', 'string'],
            'Nationality_Father_id'=> ['required', 'string'],
            'Blood_Type_Father_id'=>['nullable','in:+o,-o'],
            'Religion_Father_id'=> ['required', 'string'],
            'Address_Father'=> ['required', 'string'],

            'Name_Mother'=> ['required', 'string', 'min:3', 'max:255'],
            'National_ID_Mother'=> ['required','int'],
            'Passport_ID_Mother'=> ['required','int'],
            'Phone_Mother'=> ['required','int'],
            'Language_Mother'=> ['required', 'string'],
            'Nationality_Mother_id'=> ['required', 'string'],
            'Blood_Type_Mother_id'=>['nullable','in:+o,-o'],
            'Religion_Mother_id'=> ['required', 'string'],
            'Address_Mother'=> ['required', 'string'],

        ];
    }
    public function studant()
    {
        return $this->hasMany(Studant::class, 'myparent_id', 'id');
    }
}
