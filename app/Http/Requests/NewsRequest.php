<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $isRequiredForThumbnail = Route::currentRouteName() == 'news.update' ? 'nullable' : 'required';
        return [
            'title' => 'required|max:255',
            'news_thumbnail' => $isRequiredForThumbnail . '|image|mimes:jpeg,png,jpg|max:5120',
            'content' => 'required|min:10',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'Judul',
            'news_thumbnail' => 'Gambar',
            'content' => 'Konten',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            '*.required' => ':attribute harus diisi',
            'news_thumbnail.image' => 'Gambar harus berupa file image',
            'news_thumbnail.mimes' => 'Gambar harus berupa file type: jpeg, png, jpg',
            'news_thumbnail.max' => 'Gambar maksimal 5MB',
            'content.min' => 'Konten minimal 10 karakter',
        ];
    }
}
