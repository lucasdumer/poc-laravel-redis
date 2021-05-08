<?php

namespace App\Services;

use App\Requests\BookCreateRequest;
use App\Repositories\AuthorRepository;

class AuthorService
{
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function create(BookCreateRequest $request)
    {
        return $this->authorRepository->create($request);
    }

    public function find(int $id)
    {
        return $this->authorRepository->find($id);
    }
}
