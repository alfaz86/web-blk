<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        return [
            'organizational_structure' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'vission_and_mission' => 'required|min:10',
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
            'organizational_structure' => 'Gambar',
            'vission_and_mission' => 'Visi dan Misi',
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
            'organizational_structure.image' => 'Gambar harus berupa file image',
            'organizational_structure.mimes' => 'Gambar harus berupa file type: jpeg, png, jpg',
            'organizational_structure.max' => 'Gambar maksimal 5MB',
            'vission_and_mission.min' => 'Visi dan Misi minimal 10 karakter',
        ];
    }
}
