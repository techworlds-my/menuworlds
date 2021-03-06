<?php

namespace App\Http\Requests;

use App\Models\AddOnManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddOnManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_on_management_edit');
    }

    public function rules()
    {
        return [
            'title'       => [
                'string',
                'required',
            ],
            'price'       => [
                'required',
            ],
            'item'        => [
                'string',
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
