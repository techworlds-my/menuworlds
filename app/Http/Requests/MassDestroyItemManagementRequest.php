<?php

namespace App\Http\Requests;

use App\Models\ItemManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyItemManagementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('item_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:item_managements,id',
        ];
    }
}
