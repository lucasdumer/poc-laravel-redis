<?php

namespace App\Http\Controllers;

use App\Requests\BookCreateRequest;

class AuthorController extends Controller
{
    public function create(BookCreateRequest $request)
    {
        try {
            $data = $request->json()->all();

            return $this->success($data, "success create author");
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }
}
