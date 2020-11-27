<?php

namespace App\Http\Requests;

use App\Models\ItemManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateItemManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_management_edit');
    }

    public function rules()
    {
        return [
            'title'           => [
                'string',
                'required',
            ],
            'price'           => [
                'required',
            ],
            'sales_price'     => [
                'string',
                'nullable',
            ],
            'rate'            => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sub_cateogry_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
