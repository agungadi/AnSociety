<?php

namespace App\Http\Requests;

use App\Jembatan;
use Illuminate\Foundation\Http\FormRequest;

class UpdateJembatanRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('jembatan_edit');
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
