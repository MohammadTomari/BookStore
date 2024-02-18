<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    protected $model;

    public function __construct(Author $author)
    {
        $this->model = $author;
    }

    public function all(Request $request)
    {
        if ($request->tag_id != "") {
            $authors = $this->model->where('tag_id', $request->tag_id)->get();
            return $authors;
        } else {
            $authors = $this->model->all();
        }

        return response([
            'data' => $authors,
        ]);
    }

    public function getAuthorById(Request $request)
    {
        $author = $this->model->find($request->id);

        if ($author) {
            return response([
                'status' => 'success',
                'data' => $author,
            ]);
        } else {
            return response([
                'status' => 'failed',
                'data' => 'not found',
            ]);
        }
    }

    public function createNewAuthor(AuthorRequest $request)
    {
        $author = $this->model->create([
            'name' => $request->name,
            'tag_id' => $request->tag_id,
        ]);

        return response([
            'status' => 'success',
            'message' => 'Author added successfully!',
            'details' => $request->all(),
        ]);
    }
}
