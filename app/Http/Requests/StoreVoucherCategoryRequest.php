<?php

namespace App\Http\Requests;

use App\Models\VoucherCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVoucherCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('voucher_category_create');
    }

    public function rules()
    {
        return [
            'category' => [
                'string',
                'nullable',
            ],
        ];
    }
}
