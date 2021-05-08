<?php

namespace App\Services;

use App\Requests\BookCreateRequest;
use App\Requests\BookDeleteRequest;
use App\Requests\BookFindRequest;
use App\Requests\BookListRequest;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Models\Book;

class BookService
{
    private $bookRepository;

    private $authorRepository;

    public function __construct(
        BookRepository $bookRepository,
        AuthorRepository $authorRepository
    ) {
        $this->bookRepository = $bookRepository;
        $this->authorRepository = $authorRepository;
    }

    public function create(BookCreateRequest $request): Book
    {
        try {
            $author = $this->authorRepository->find($request->authorId);
            if (empty($author)) {
                throw new \Exception("Dont find author.");
            }
            return $this->bookRepository->create($request, $author);
        } catch(\Exception $e) {
            throw new \Exception("Error on creating book. ".$e->getMessage());
        }
    }

    public function find(BookFindRequest $request): ?Book
    {
        try {
            return $this->bookRepository->find((int) $request->id);
        } catch(\Exception $e) {
            throw new \Exception("Error on find book. ".$e->getMessage());
        }
    }

    public function list(BookListRequest $request)
    {
        try {
            return $this->bookRepository->list($request);
        } catch(\Exception $e) {
            throw new \Exception("Error on list book. ".$e->getMessage());
        }
    }

    public function delete(BookDeleteRequest $request): void
    {
        try {
            $this->bookRepository->delete((int) $request->id);
        } catch(\Exception $e) {
            throw new \Exception("Error on delete book. ".$e->getMessage());
        }
    }
}
