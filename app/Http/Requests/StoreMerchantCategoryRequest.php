<?php

namespace App\Http\Requests;

use App\Models\MerchantCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMerchantCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('merchant_category_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
