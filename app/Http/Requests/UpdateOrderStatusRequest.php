<?php

namespace App\Http\Requests;

use App\Models\OrderStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_status_edit');
    }

    public function rules()
    {
        return [
            'status'    => [
                'string',
                'required',
            ],
            'in_enable' => [
                'required',
            ],
        ];
    }
}
