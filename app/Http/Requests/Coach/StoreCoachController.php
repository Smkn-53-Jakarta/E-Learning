<?php

namespace App\Http\Requests\Coach;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCoachController extends FormRequest
{
    public function rules(): array
    {
        $userTable = (new User())->getTable();

        return [
            'profile_picture' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:10240'],
            'name' => ['required', 'string', 'max:64'],
            'status_id' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:64', Rule::unique($userTable, 'email')],
        ];
    }

    public function messages(): array
    {
        return [
            'profile_picture.image' => 'Foto harus berupa file gambar.',
            'profile_picture.mimes' => 'Foto harus memiliki format jpg, png, atau jpeg.',
            'profile_picture.max' => 'Foto maksimal berukuran 10MB.',
            'name.required' => 'Nama murid wajib diisi',
            'name.string' => 'Nama murid wajib string',
            'name.max' => 'Nama murid maksimal 64 karakter',
            'status_id.required' => 'Status wajib diisi',
            'status_id.string' => 'Status wajib string',
            'email.required' => 'Email wajib diisi',
            'email.string' => 'Email wajib string',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 64 karakter',
            'email.unique' => 'Email sudah terdaftar',
        ];
    }
}
