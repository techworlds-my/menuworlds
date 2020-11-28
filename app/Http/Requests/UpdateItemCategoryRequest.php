<?php

namespace App\Http\Requests;

use App\Models\ItemCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateItemCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_category_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
