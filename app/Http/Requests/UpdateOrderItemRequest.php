<?php

namespace App\Http\Requests;

use App\Models\OrderItem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOrderItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_item_edit');
    }

    public function rules()
    {
        return [
            'quantity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
