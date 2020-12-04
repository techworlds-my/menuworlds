<?php

namespace App\Http\Requests;

use App\Models\ItemCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_category_create');
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
