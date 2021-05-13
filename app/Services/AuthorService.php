<?php

namespace App\Services;

use App\Requests\AuthorCreateRequest;
use App\Requests\AuthorDeleteRequest;
use App\Requests\AuthorFindRequest;
use App\Requests\AuthorListRequest;
use App\Requests\AuthorUpdateRequest;
use App\Repositories\AuthorRepository;
use App\Models\Author;
use App\Services\RedisService;

class AuthorService
{
    private $authorRepository;

    private $redisService;

    public function __construct(
        AuthorRepository $authorRepository, 
        RedisService $redisService
    ) {
        $this->authorRepository = $authorRepository;
        $this->redisService = $redisService;
    }

    public function create(AuthorCreateRequest $request): Author
    {
        try {
            $author = $this->authorRepository->create($request);
            $this->redisService->clear('authors');
            return $author;
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
            $authors = $this->redisService->get('authors');
            if (!empty($authors)) {
                return $authors;
            }
            $authors = $this->authorRepository->list($request);
            $this->redisService->set('authors', $authors);
            return $authors;
        } catch(\Exception $e) {
            throw new \Exception("Error on list author. ".$e->getMessage());
        }
    }

    public function delete(AuthorDeleteRequest $request): void
    {
        try {
            $this->authorRepository->delete((int) $request->id);
            $this->redisService->clear('authors');
        } catch(\Exception $e) {
            throw new \Exception("Error on delete author. ".$e->getMessage());
        }
    }

    public function update(AuthorUpdateRequest $request): ?Author
    {
        try {
            $author = $this->authorRepository->update($request);
            $this->redisService->clear('authors');
            return $author;
        } catch(\Exception $e) {
            throw new \Exception("Error on update author. ".$e->getMessage());
        }
    }
}
