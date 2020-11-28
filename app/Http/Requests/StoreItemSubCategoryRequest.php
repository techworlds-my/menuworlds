<?php

namespace App\Http\Requests;

use App\Models\ItemSubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_sub_category_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
