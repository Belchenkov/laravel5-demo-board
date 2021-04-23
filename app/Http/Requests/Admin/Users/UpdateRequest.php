<?php

namespace App\Http\Requests\Admin\Users;

use App\Entity\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [

            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users,id,' . $this->user->id ,
            'status' => [ 'required', 'string', Rule::in([User::STATUS_WAIT, User::STATUS_ACTIVE]) ]

        ];
    }
}
