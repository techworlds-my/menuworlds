<?php

namespace App\Http\Requests;

use App\Models\MerchantSubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMerchantSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('merchant_sub_category_create');
    }

    public function rules()
    {
        return [
            'sub_category' => [
                'string',
                'required',
            ],
            'category_id'  => [
                'required',
                'integer',
            ],
        ];
    }
}
