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
}
