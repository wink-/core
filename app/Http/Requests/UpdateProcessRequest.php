<?php

namespace App\Http\Requests;

use App\Process;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateProcessRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('process_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'code'     => [
                'max:10',
                'required',
                'unique:processes,code,' . request()->route('process')->id,
            ],
            'name'     => [
                'required',
                'unique:processes,name,' . request()->route('process')->id,
            ],
            'revision' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
