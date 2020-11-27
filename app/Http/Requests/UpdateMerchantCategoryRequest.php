<?php

namespace App\Http\Requests;

use App\Models\MerchantCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMerchantCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('merchant_category_edit');
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
