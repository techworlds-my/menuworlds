<?php

namespace App\Http\Requests;

use App\Models\OrderManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_management_create');
    }

    public function rules()
    {
        return [
            'order'       => [
                'string',
                'required',
                'unique:order_managements',
            ],
            'username'    => [
                'string',
                'required',
            ],
            'address'     => [
                'string',
                'required',
            ],
            'price'       => [
                'required',
            ],
            'total'       => [
                'required',
            ],
            'comment'     => [
                'string',
                'nullable',
            ],
            'time_needed' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
