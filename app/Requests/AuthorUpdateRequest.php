<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorUpdateRequest extends FormRequest
{
    public function all($keys = null)
    {
        $data = parent::all();
        $data['id'] = $this->route('id');
        return $data;
    }

    public function rules()
    {
        return [            
            'name' => 'required|max:255',
            'id' => 'required|integer'
        ];
    }
}