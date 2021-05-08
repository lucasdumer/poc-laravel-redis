<?php

namespace App\Services;

use App\Requests\AuthorCreateRequest;
use App\Requests\AuthorDeleteRequest;
use App\Requests\AuthorFindRequest;
use App\Requests\AuthorListRequest;
use App\Repositories\AuthorRepository;
use App\Models\Author;

class AuthorService
{
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function create(AuthorCreateRequest $request): Author
    {
        return $this->authorRepository->create($request);
    }

    public function find(AuthorFindRequest $request): ?Author
    {
        return $this->authorRepository->find((int) $request->id);
    }

    public function list(AuthorListRequest $request)
    {
        return $this->authorRepository->list($request);
    }

    public function delete(AuthorDeleteRequest $request): void
    {
        $this->authorRepository->delete((int) $request->id);
    }
}
