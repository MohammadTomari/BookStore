<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function all(Request $request)
    {
        if ($request->tag != "") {
            $authors = Author::where('tag', $request->tag)->get();
            return $authors;
        } else {
            $authors = Author::all();
        }

        return response([
            'data' => $authors,
        ]);
    }

    public function getAuthorById(Request $request)
    {
        $author = Author::find($request->id);

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
        $author = Author::create([
            'name' => $request->name,
            'tag' => $request->tag,
        ]);

        return response([
            'status' => 'success',
            'message' => 'Author added successfully!',
            'details' => $request->all(),
        ]);
    }
}
