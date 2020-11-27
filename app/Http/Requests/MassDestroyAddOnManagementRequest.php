<?php

namespace App\Http\Requests;

use App\Models\AddOnManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAddOnManagementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('add_on_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:add_on_managements,id',
        ];
    }
}
