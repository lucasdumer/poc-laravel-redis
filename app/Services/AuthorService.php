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
        try {
            return $this->authorRepository->create($request);
        } catch(\Exception $e) {
            throw new \Exception("Error on creating author. ".$e->getMessage());
        }
    }

    public function find(AuthorFindRequest $request): ?Author
    {
        try {
            return $this->authorRepository->find((int) $request->id);
        } catch(\Exception $e) {
            throw new \Exception("Error on find author. ".$e->getMessage());
        }
    }

    public function list(AuthorListRequest $request)
    {
        try {
            return $this->authorRepository->list($request);
        } catch(\Exception $e) {
            throw new \Exception("Error on list author. ".$e->getMessage());
        }
    }

    public function delete(AuthorDeleteRequest $request): void
    {
        try {
            $this->authorRepository->delete((int) $request->id);
        } catch(\Exception $e) {
            throw new \Exception("Error on delete author. ".$e->getMessage());
        }
    }
}
