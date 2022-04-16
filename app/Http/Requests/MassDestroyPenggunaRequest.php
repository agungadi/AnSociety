<?php

namespace App\Http\Requests;

use App\Pengguna;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyPenggunaRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('pengguna_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pengguna,id',
        ];
    }
}
