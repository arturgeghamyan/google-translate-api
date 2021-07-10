<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TranslateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'from' => ['required', "regex:/^[a-zA-Z]+$/u"],
            'to' => ['required', "regex:/^[a-zA-Z]+$/u"],
            'text' => ['required'],
        ];
    }
}
