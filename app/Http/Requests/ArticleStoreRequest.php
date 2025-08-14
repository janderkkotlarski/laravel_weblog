<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'entry' => 'required|string',
            'premium' => 'required|integer|min:0|max:1',           
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Er is geen user_id.',
            'user_id.integer' => 'user_id is geen geheel getal.',
            'user_id.gte' => 'user_id moet minstens 1 zijn.',
            'name.required' => 'Waar is de naam?',
            'name.max' => 'Naam is langer dan 255 tekens',
            'entry.required' => 'Waar is de tekst?',
            'premium.required' => 'Een premium aanduiding is noodzakelijk.',
            'premium.min' => 'Premium mag minimaal 0 zijn.',
            'premium.max' => 'Premium mag maximaal 1 zijn.'
        ];
    }
}
