<?php

namespace App\Http\Requests;

use App\Models\Studant;
use Illuminate\Foundation\Http\FormRequest;

class StudantRequest extends FormRequest
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
        $id=$this->route('studant');
        return Studant::rules($id);
    }
}
