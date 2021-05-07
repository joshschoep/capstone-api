<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QueryUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'filter' => 'nullable|alpha_num',
            'sort' => 'nullable|in:first_name,last_name,title,created_at',
        ];
    }
}
