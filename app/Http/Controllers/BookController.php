<?php

namespace App\Http\Controllers;

use App\Requests\BookCreateRequest;
use App\Requests\BookDeleteRequest;
use App\Requests\BookFindRequest;
use App\Requests\BookListRequest;
use App\Requests\BookUpdateRequest;
use App\Services\BookService;

class BookController extends Controller
{
    public function __construct(private BookService $bookService) {}

    public function create(BookCreateRequest $request)
    {
        return $this->success($this->bookService->create($request));
    }

    public function find(BookFindRequest $request)
    {
        return $this->success($this->bookService->find($request));
    }

    public function list(BookListRequest $request)
    {
        return $this->success($this->bookService->list($request));
    }

    public function delete(BookDeleteRequest $request)
    {
        $this->bookService->delete($request);
        return $this->success();
    }

    public function update(BookUpdateRequest $request)
    {
        return $this->success($this->bookService->update($request));
    }
}
