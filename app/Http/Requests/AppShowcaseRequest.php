<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppShowcaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'app_name' => 'required|max:255',
            'app_description' => 'required',
            'app_banner' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'app_version' => 'required',
            'app_package_name' => 'required|unique:app_showcase,app_package_name,' . $this->id,
            'app_download_link' => 'required|url',
            'app_min_android_version' => 'required',
            'app_size' => 'required|numeric|between:0,999.99',
            'screenshots.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ];
    }    
}
