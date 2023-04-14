<?php

namespace App\Http\Requests;

use App\Models\Schoolgrade;
use Illuminate\Foundation\Http\FormRequest;

class SchoolGradeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $id=$this->route('schoolgrades');
        return Schoolgrade::rules($id);
    }
}
