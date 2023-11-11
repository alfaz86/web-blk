<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'number' => 'required|numeric|min:10',
            'address' => 'required',
            'ktp_image' => 'required|file|mimes:png,jpeg,jpg',
            'kk_image' => 'required|file|mimes:png,jpeg,jpg',
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
            'name' => 'Nama',
            'email' => 'Email',
            'number' => 'Nomor Telepon',
            'address' => 'Alamat',
            'ktp_image' => 'Foto KTP',
            'kk_image' => 'Foto KK',
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
            'email.unique' => 'Email sudah terdaftar',
            'email.email' => 'Email tidak valid',
            'number.numeric' => 'Nomor telepon harus berupa angka',
            'number.min' => 'Nomor telepon minimal 10 digit',
            'ktp_image.mimes' => 'Foto KTP harus berupa gambar',
            'kk_image.mimes' => 'Foto KK harus berupa gambar',
        ];
    }
}
