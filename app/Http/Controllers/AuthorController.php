<?php

namespace App\Http\Controllers;

use App\Requests\BookCreateRequest;
use App\Requests\BookDeleteRequest;
use App\Requests\BookFindRequest;
use App\Requests\BookListRequest;
use App\Services\AuthorService;

class AuthorController extends Controller
{
    private $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function create(BookCreateRequest $request)
    {
        try {
            $author = $this->authorService->create($request);
            return $this->success($author);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function find(BookFindRequest $request)
    {
        try {
            $author = $this->authorService->find($request);
            return $this->success($author);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function list(BookListRequest $request)
    {
        try {
            $authors = $this->authorService->list($request);
            return $this->success($authors);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function delete(BookDeleteRequest $request)
    {
        try {
            $this->authorService->delete($request);
            return $this->success();
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }
}
