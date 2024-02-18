<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    protected $model;

    public function __construct(Tag $tag)
    {
        $this->model = $tag;
    }

    public function all(Request $request)
    {
        return response([
            'data' => $this->model->all(),
        ]);
    }

    public function getTagById(Request $request)
    {
        $tag = $this->model->find($request->id);

        if ($tag) {
            return response([
                'status' => 'success',
                'data' => $tag,
            ]);
        } else {
            return response([
                'status' => 'failed',
                'data' => 'not found',
            ]);
        }
    }

    public function createNewTag(TagRequest $request)
    {
        $this->model->create([
            'name' => $request->name,
        ]);

        return response([
            'status' => 'success',
            'message' => 'Tag created successfully!',
            'details' => $request->all(),
        ]);
    }
}
