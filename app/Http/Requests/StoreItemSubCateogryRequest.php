<?php

namespace App\Http\Requests;

use App\Models\ItemSubCateogry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemSubCateogryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_sub_cateogry_create');
    }

    public function rules()
    {
        return [
            'title'            => [
                'string',
                'required',
            ],
            'item_category_id' => [
                'required',
                'integer',
            ],
            'is_enable'        => [
                'string',
                'nullable',
            ],
        ];
    }
}
