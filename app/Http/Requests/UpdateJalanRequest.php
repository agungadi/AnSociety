<?php

namespace App\Http\Requests;

use App\Jalan;
use Illuminate\Foundation\Http\FormRequest;

class UpdateJalanRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('jalan_edit');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
        ];
    }
}
