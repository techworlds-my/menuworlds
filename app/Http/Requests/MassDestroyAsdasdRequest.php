<?php

namespace App\Http\Requests;

use App\Models\Asdasd;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAsdasdRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asdasd_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:asdasds,id',
        ];
    }
}
