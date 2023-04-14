<?php

namespace App\Http\Requests;

use App\Models\Myparent;
use Illuminate\Foundation\Http\FormRequest;

class MyparintRequest extends FormRequest
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
        $id=$this->route('parent');
        return Myparent::rules($id);
    }
}
