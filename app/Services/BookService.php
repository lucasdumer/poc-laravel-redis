<?php

namespace App\Services;

use App\Requests\BookCreateRequest;
use App\Requests\BookDeleteRequest;
use App\Requests\BookFindRequest;
use App\Requests\BookListRequest;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Models\Book;
use App\Services\RedisService;

class BookService
{
    private $bookRepository;

    private $authorRepository;

    private $redisService;

    public function __construct(
        BookRepository $bookRepository,
        AuthorRepository $authorRepository,
        RedisService $redisService
    ) {
        $this->bookRepository = $bookRepository;
        $this->authorRepository = $authorRepository;
        $this->redisService = $redisService;
    }

    public function create(BookCreateRequest $request): Book
    {
        try {
            $author = $this->authorRepository->find($request->authorId);
            if (empty($author)) {
                throw new \Exception("Dont find author.");
            }
            $book = $this->bookRepository->create($request, $author);
            $this->redisService->clear('books');
            return $book;
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
            $books = $this->redisService->get('books');
            if (!empty($books)) {
                return $books;
            }
            $books = $this->bookRepository->list($request);
            $this->redisService->set('books', $books);
            return $books;
        } catch(\Exception $e) {
            throw new \Exception("Error on list book. ".$e->getMessage());
        }
    }

    public function delete(BookDeleteRequest $request): void
    {
        try {
            $this->bookRepository->delete((int) $request->id);
            $this->redisService->clear('books');
        } catch(\Exception $e) {
            throw new \Exception("Error on delete book. ".$e->getMessage());
        }
    }
}
