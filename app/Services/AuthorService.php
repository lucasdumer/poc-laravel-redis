<?php

namespace App\Services;

use App\Requests\BookCreateRequest;
use App\Requests\BookDeleteRequest;
use App\Requests\BookFindRequest;
use App\Requests\BookListRequest;
use App\Repositories\AuthorRepository;
use App\Models\Author;

class AuthorService
{
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function create(BookCreateRequest $request): Author
    {
        return $this->authorRepository->create($request);
    }

    public function find(BookFindRequest $request): Author
    {
        return $this->authorRepository->find((int) $request->id);
    }

    public function list(BookListRequest $request)
    {
        return $this->authorRepository->list($request);
    }

    public function delete(BookDeleteRequest $request): void
    {
        $this->authorRepository->delete((int) $request->id);
    }
}
