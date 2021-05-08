<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookListRequest extends FormRequest
{
    public function all($keys = null)
    {
        $data = parent::all();
        $data['name'] = $this->query('name');
        $data['authorId'] = $this->query('authorId');
        return $data;
    }

    public function rules()
    {
        return [
            'name' => ['max:255'],
            'authorId' => ['integer', 'nullable']
        ];
    }
}