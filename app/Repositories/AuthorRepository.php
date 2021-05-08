<?php

namespace App\Repositories;

use App\Requests\AuthorCreateRequest;
use App\Requests\AuthorListRequest;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class AuthorRepository
{
    public function create(AuthorCreateRequest $request): Author
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

    public function find(int $id): ?Author
    {
        try {
            $author = Author::find($id);
            return $author;
        } catch(\Exception $e) {
            throw new \Exception("Error find author. ".$e->getMessage());
        }
    }

    public function list(AuthorListRequest $request)
    {
        try {
            $author = DB::table('author');
            if (!empty($request->name)) {
                $author->where('name', 'like', '%'.$request->name.'%');
            }
            return $author->get();
        } catch(\Exception $e) {
            throw new \Exception("Error list author. ".$e->getMessage());
        }
    }

    public function delete(int $id): void
    {
        try {
            $author = Author::find($id);
            if (empty($author)) {
                throw new \Exception("No find with id.");
            }
            $author->delete();
        } catch(\Exception $e) {
            throw new \Exception("Error delete author. ".$e->getMessage());
        }
    }
}
