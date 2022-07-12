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
    public function __construct(private AuthorService $authorService) {}

    public function create(AuthorCreateRequest $request)
    {
        return $this->success($this->authorService->create($request));
    }

    public function find(AuthorFindRequest $request)
    {
        return $this->success($this->authorService->find($request));
    }

    public function list(AuthorListRequest $request)
    {
        return $this->success($this->authorService->list($request));
    }

    public function delete(AuthorDeleteRequest $request)
    {
        $this->authorService->delete($request);
        return $this->success();
    }

    public function update(AuthorUpdateRequest $request)
    {
        return $this->success($this->authorService->update($request));
    }
}
