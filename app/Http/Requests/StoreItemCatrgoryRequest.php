<?php

namespace App\Http\Requests;

use App\Models\ItemCatrgory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemCatrgoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_catrgory_create');
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
