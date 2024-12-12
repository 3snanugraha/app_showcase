<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TesterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'app_id' => 'required|exists:app_showcase,id'
        ];
    }
}
