<?php

namespace App\Http\Controllers;

use App\Requests\BookCreateRequest;
use App\Requests\BookDeleteRequest;
use App\Requests\BookFindRequest;
use App\Requests\BookListRequest;
use App\Services\BookService;

class BookController extends Controller
{
    private $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function create(BookCreateRequest $request)
    {
        try {
            $book = $this->bookService->create($request);
            return $this->success($book);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function find(BookFindRequest $request)
    {
        try {
            $book = $this->bookService->find($request);
            return $this->success($book);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function list(BookListRequest $request)
    {
        try {
            $book = $this->bookService->list($request);
            return $this->success($book);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function delete(BookDeleteRequest $request)
    {
        try {
            $this->bookService->delete($request);
            return $this->success();
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }
}
