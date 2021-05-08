<?php

namespace App\Repositories;

use App\Requests\BookCreateRequest;
use App\Models\Author;

class AuthorRepository
{
    public function create(BookCreateRequest $request)
    {
        try {
            $author = new Author();
            $author->name = $request->name;
            $author->save();
            return $author;
        } catch(\Exception $e) {
            throw new \Exception("Error creating author. ".$e->getMessage());
        }
    }
}