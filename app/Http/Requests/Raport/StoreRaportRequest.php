<?php

namespace App\Http\Requests\Raport;

use Illuminate\Foundation\Http\FormRequest;

class StoreRaportRequest extends FormRequest
{
    public function rules()
    {
        return [
            'raports' => 'required|array',
            'raports.*.student_id' => 'required|string',
            'raports.*.average_value' => 'nullable|integer',
            'raports.*.uts' => 'nullable|integer',
            'raports.*.uas' => 'nullable|integer',
            'raports.*.information' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'raports.required' => 'Raports tidak boleh kosong.',
            'raports.array' => 'Raports harus berupa array.',
            'raports.*.average_value.integer' => 'Rata rata nilai tugas setiap raport harus berupa angka.',
            'raports.*.uts.integer' => 'Uts setiap raport harus berupa angka.',
            'raports.*.uas.integer' => 'Uas setiap raport harus berupa angka.',
            'raports.*.information.string' => 'Information setiap raport harus berupa string.',
        ];
    }
}
