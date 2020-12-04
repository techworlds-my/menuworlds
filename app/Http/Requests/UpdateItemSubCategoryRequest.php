<?php

namespace App\Http\Requests;

use App\Models\ItemSubCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateItemSubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_sub_category_edit');
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
