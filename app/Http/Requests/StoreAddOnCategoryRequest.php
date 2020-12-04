<?php

namespace App\Http\Requests;

use App\Models\AddOnCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddOnCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_on_category_create');
    }

    public function rules()
    {
        return [
            'title'     => [
                'string',
                'required',
            ],
            'is_enable' => [
                'required',
            ],
        ];
    }
}
