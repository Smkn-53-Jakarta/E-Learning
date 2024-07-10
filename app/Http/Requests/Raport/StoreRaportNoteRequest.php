<?php

namespace App\Http\Requests\Raport;

use Illuminate\Foundation\Http\FormRequest;

class StoreRaportNoteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'notes' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'notes.required' => 'Catatan Wali Kelas tidak boleh kosong.',
            'notes.string' => 'Catatan Wali Kelas harus berupa string',
        ];
    }
}
