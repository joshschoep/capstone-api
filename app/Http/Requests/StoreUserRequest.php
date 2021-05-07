<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'first_name' => 'required|alpha|max:128',
            'last_name' => 'required|alpha|max:128',
            'email' => 'email',
            'title' => 'required',
            'capacity' => ['required', Rule::in(User::CAPACITIES)],
            'mobile' => 'nullable|numeric',
            'notes' => 'nullable',
            'role' => Rule::in(User::ROLES),
            'notify' => 'required|boolean'
        ];
    }
}
