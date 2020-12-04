<?php

namespace App\Http\Requests;

use App\Models\Asdasd;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAsdasdRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asdasd_create');
    }

    public function rules()
    {
        return [
            'adasda' => [
                'string',
                'nullable',
            ],
        ];
    }
}
