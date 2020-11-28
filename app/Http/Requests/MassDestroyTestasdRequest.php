<?php

namespace App\Http\Requests;

use App\Models\Testasd;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTestasdRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('testasd_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:testasds,id',
        ];
    }
}
