<?php

namespace App\Http\Requests;

use App\Models\Testasd;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTestasdRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('testasd_create');
    }

    public function rules()
    {
        return [
            'asd' => [
                'string',
                'nullable',
            ],
        ];
    }
}
