<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
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
        return [
            'user_id' => 'required|integer|gte:1',
            'article_id' => 'required|integer|gte:1',
            'entry' => 'required|string',          
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Er is geen user_id.',
            'user_id.integer' => 'user_id is geen geheel getal.',
            'user_id.gte' => 'user_id moet minstens 1 zijn.',
            'article_id.required' => 'Er is geen user_id.',
            'article_id.integer' => 'user_id is geen geheel getal.',
            'article_id.gte' => 'user_id moet minstens 1 zijn.',
            'entry.required' => 'Waar is de tekst?',
        ];
    }
}
