<?php

namespace App\Http\Controllers;

use App\Requests\BookCreateRequest;
use App\Requests\BookFindRequest;
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
            $author = $this->authorService->find((int) $request->id);
            return $this->success($author);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }
}
