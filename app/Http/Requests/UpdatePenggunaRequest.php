<?php

namespace App\Http\Requests;

use App\Pengguna;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePenggunaRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('pengguna_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}
