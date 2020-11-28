<?php

namespace App\Http\Requests;

use App\Models\SeatsManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySeatsManagementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('seats_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:seats_managements,id',
        ];
    }
}
