<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWebhookRequest extends FormRequest
{

    protected $errorBag = 'createWebhook';

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
            'identifier' => [
                'required',
                'string',
                'max: 60'
            ],
            'url' => [
                'required',
                'string',
                'regex:/discord.com\/api\/webhooks\/([^\/]+)\/([^\/]+)/'
            ]
        ];
    }
}
