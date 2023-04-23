<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReminderRequest extends FormRequest
{

    protected $errorBag = 'createReminder';
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
            'title' => [
                'required',
                'string',
                'max:60'
            ],
            'webhook_id' => [
                'required',
                'exists:webhooks,id'
            ],
            'date' => [
                'required',
                'date'
            ],
            'description' => 'nullable'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            $date = $validator->safe()->date;

            if (strtotime($date) < strtotime('now')) {
                $validator->errors()->add('date', 'Date must be in the future.');
            }
        });
    }
}
