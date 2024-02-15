<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class BookUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'max:255',
            'author' => 'max:25',
            'year' => 'max:4',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Non valid!',
            'data'      => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'title.max' => 'Title is too long',
            'author.max' => 'Author is too long',
            'year.max' => 'Year is too long',
        ];
    }
}
