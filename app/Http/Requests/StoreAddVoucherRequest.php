<?php

namespace App\Http\Requests;

use App\Models\AddVoucher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddVoucherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_voucher_create');
    }

    public function rules()
    {
        return [
            'voucher_code'     => [
                'string',
                'required',
            ],
            'value'            => [
                'required',
            ],
            'redeem_point'     => [
                'numeric',
            ],
            'expired_time'     => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'select_items.*'   => [
                'integer',
            ],
            'select_items'     => [
                'array',
            ],
            'min_spend'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'max_spend'        => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'usage_limit'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'limit_per_user'   => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'categories.*'     => [
                'integer',
            ],
            'categories'       => [
                'array',
            ],
            'sub_categories.*' => [
                'integer',
            ],
            'sub_categories'   => [
                'array',
            ],
        ];
    }
}
