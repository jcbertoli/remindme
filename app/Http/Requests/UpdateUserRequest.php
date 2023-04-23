<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
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
            'id' => [
                'required',
                'int',
                'exists:users,id',
                'gt:1'
            ],
            'username' => [
                'required',
                'min:4',
                'max:15',
                'string',
                'unique:users,username,' . $this->id
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email,' . $this->id
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
