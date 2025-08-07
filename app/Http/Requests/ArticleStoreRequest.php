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
        // $article->user_id = Auth::id();
        // $article->name = $request->input('name');
        // $article->entry = $request->input('entry');
        // $article->premium = $request->input('premium');
        // $article->save();


        return [
            'user_id' => 'required',
            'name' => 'required|string|max:255',
            'entry' => 'required|string',
            'premium' => 'required|integer|min:0|max:1',           
        ];
    }
}
