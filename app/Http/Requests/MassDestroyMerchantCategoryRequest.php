<?php

namespace App\Http\Requests;

use App\Models\MerchantCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMerchantCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('merchant_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:merchant_categories,id',
        ];
    }
}
