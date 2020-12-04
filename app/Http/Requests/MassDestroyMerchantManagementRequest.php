<?php

namespace App\Http\Requests;

use App\Models\MerchantManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMerchantManagementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('merchant_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:merchant_managements,id',
        ];
    }
}
