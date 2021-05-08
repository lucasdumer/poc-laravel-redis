<?php

namespace App\Repositories;

use App\Requests\BookCreateRequest;
use App\Requests\BookListRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookRepository
{
    public function create(BookCreateRequest $request, Author $author): Book
    {
        try {
            $book = new Book();
            $book->name = $request->name;
            $book->author_id = $author->id;
            $book->save();
            return $book;
        } catch(\Exception $e) {
            throw new \Exception("Database error on creating book. ".$e->getMessage());
        }
    }

    public function find(int $id): ?Book
    {
        try {
            $book = Book::find($id);
            return $book;
        } catch(\Exception $e) {
            throw new \Exception("Database error on find book. ".$e->getMessage());
        }
    }

    public function list(BookListRequest $request)
    {
        try {
            $book = DB::table('book');
            if (!empty($request->name)) {
                $book->where('name', 'like', '%'.$request->name.'%');
            }
            if (!empty($request->authorId)) {
                $book->where('author_id', '=', $request->authorId);
            }
            return $book->get();
        } catch(\Exception $e) {
            throw new \Exception("Database error on list book. ".$e->getMessage());
        }
    }

    public function delete(int $id): void
    {
        try {
            $book = Book::find($id);
            if (empty($book)) {
                throw new \Exception("No find with id.");
            }
            $book->delete();
        } catch(\Exception $e) {
            throw new \Exception("Database error on delete book. ".$e->getMessage());
        }
    }
}
