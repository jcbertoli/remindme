<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{

    protected $errorBag = 'createUser';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => [
                'required',
                'min:4',
                'max:15',
                'string',
                'unique:users,username'
            ],
            'email' => [
                'required',
                'unique:users,email',
                'email'
            ],
            'role' => [
                'required',
                'int',
                'between:1,2',
            ],
            'discord_id' => [
                'nullable',
                'min:17',
                'max:18'
            ]
        ];
    }
}
