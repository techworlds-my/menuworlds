<?php

namespace App\Http\Requests;

use App\Models\ItemCatrgory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateItemCatrgoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_catrgory_edit');
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
