<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorCreateRequest extends FormRequest
{
    public function rules()
    {
        return [            
            'name' => ['required', 'max:255']
        ];
    }
}