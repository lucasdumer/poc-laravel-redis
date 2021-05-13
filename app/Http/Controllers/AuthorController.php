<?php

namespace App\Http\Controllers;

use App\Requests\AuthorCreateRequest;
use App\Requests\AuthorDeleteRequest;
use App\Requests\AuthorFindRequest;
use App\Requests\AuthorListRequest;
use App\Requests\AuthorUpdateRequest;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    private $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function create(AuthorCreateRequest $request)
    {
        try {
            $author = $this->authorService->create($request);
            return $this->success($author);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function find(AuthorFindRequest $request)
    {
        try {
            $author = $this->authorService->find($request);
            return $this->success($author);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function list(AuthorListRequest $request)
    {
        try {
            $authors = $this->authorService->list($request);
            return $this->success($authors);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function delete(AuthorDeleteRequest $request)
    {
        try {
            $this->authorService->delete($request);
            return $this->success();
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function update(AuthorUpdateRequest $request)
    {
        try {
            $author = $this->authorService->update($request);
            return $this->success($author);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }
}
