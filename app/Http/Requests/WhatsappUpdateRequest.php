<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhatsappUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'value' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'value.required' => 'Value wajib diisi',
        ];
    }
}
