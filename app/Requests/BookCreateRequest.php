<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends FormRequest
{
    public function rules()
    {
        return [            
            'name' => ['required', 'max:255'],
            'authorId' => 'required|integer'
        ];
    }
}