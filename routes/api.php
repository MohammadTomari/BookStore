<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BookController;
use App\Http\Controllers\Api\V1\AuthorController;
use App\Http\Controllers\Api\V1\TagController;

Route::get('/', function() {
    return [
        'success' => true,
        'message' => 'Welcome to BookStore!',
    ];
});

/* Books */
Route::get('/books', [BookController::class, 'all']);
Route::get('/getBookById', [BookController::class, 'getBookById']);
Route::post('/create', [BookController::class, 'create']);
Route::post('/update', [BookController::class, 'update']);

/* Authors */
Route::get('/authors', [AuthorController::class, 'all']);
Route::get('/getAuthorById', [AuthorController::class, 'getAuthorById']);
Route::post('/createNewAuthor', [AuthorController::class, 'createNewAuthor']);

/* Tags */
Route::get('/tags', [TagController::class, 'all']);
Route::get('/getTagById', [TagController::class, 'getTagById']);
Route::post('/createNewTag', [TagController::class, 'createNewTag']);
