<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorListRequest extends FormRequest
{
    public function all($keys = null)
    {
        $data = parent::all();
        $data['name'] = $this->query('name');
        return $data;
    }

    public function rules()
    {
        return [
            'name' => ['max:255']
        ];
    }
}