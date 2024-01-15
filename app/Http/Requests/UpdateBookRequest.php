<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
        $book_id = $this->route('book')->id;

        return [
            "title" => "required|min:3|max:255",
            "author" => "required|min:3|max:255",
            "pub_year" => 'required|date_format:Y|before:today',
            "isbn" => "required|unique:books,isbn,".$book_id,
        ];
    }
}
