<?php

namespace App\Http\Requests;

use App\Models\MerchantLevel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMerchantLevelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('merchant_level_edit');
    }

    public function rules()
    {
        return [
            'level'       => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'module'      => [
                'string',
                'nullable',
            ],
        ];
    }
}
