<?php

namespace App\Http\Requests;

use App\Jalan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyJalanRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('jalan_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:jalan,idLapor',
        ];
    }
}
