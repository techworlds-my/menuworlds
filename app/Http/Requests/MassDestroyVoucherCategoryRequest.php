<?php

namespace App\Http\Requests;

use App\Models\VoucherCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVoucherCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('voucher_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:voucher_categories,id',
        ];
    }
}
