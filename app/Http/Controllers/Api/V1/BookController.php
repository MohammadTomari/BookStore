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
    public function all(Request $request)
    {
        if ($request->tag != "")
        {
            $books = Book::where('tag', $request->tag)->get();
            return $books;
        } else {
            $books = Book::all();
        }

        return response([
            'data' => $books,
        ]);
    }

    public function getBookById(Request $request)
    {
        $book = Book::find($request->id);

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
        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'price' => $request->price,
            'year' => $request->year,
            'tag' => $request->tag,
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
                'author' => $request->author,
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
                'details' => $request->all(),
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Update Failed!',
            ]);
        }
    }
}
