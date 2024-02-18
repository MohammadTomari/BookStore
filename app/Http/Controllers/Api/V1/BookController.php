<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Http\Requests\BookUpdateRequest;

class BookController extends Controller
{
    protected $model;

    public function __construct(Book $book)
    {
        $this->model = $book;
    }

    public function all(Request $request)
    {
        if ($request->tag != "") {
            $books = $this->model->where('tag_id', $request->tag)->get();
            return $books;
        } else {
            $books = $this->model->all();
        }

        return response([
            'data' => $books,
        ]);
    }

    public function getBookById(Request $request)
    {
        $book = $this->model->find($request->id);

        if ($book) {
            return response([
                'status' => 'success',
                'data' => $book,
            ]);
        } else {
            return response([
                'status' => 'failed',
                'data' => 'not found',
            ]);
        }
    }

    public function create(BookRequest $request) : JsonResponse
    {
        $book = $this->model->create([
            'title' => $request->title,
            'author_id' => $request->author_id,
            'price' => $request->price,
            'year' => $request->year,
            'tag_id' => $request->tag_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Book created successfully!',
            'details' => $request->all(),
        ]);
    }

    public function update(BookUpdateRequest $request)
    {
        $book = Book::find($request->id);
        
        if ($request->title != '') {
            $book->update([
                'title' => $request->title,
            ]);
        }

        if ($request->author != '') {
            $book->update([
                'author_id' => $request->author,
            ]);
        }

        if ($request->price != '') {
            $book->update([
                'price' => $request->price,
            ]);
        }

        if ($book) {
            return response()->json([
                'status' => 'success',
                'message' => "Book No. '$request->id' updated successfully!",
                'details' => $book,
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Update Failed!',
            ]);
        }
    }
}
