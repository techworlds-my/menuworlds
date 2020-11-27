<?php

namespace App\Http\Requests;

use App\Models\AddVoucher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAddVoucherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('add_voucher_edit');
    }

    public function rules()
    {
        return [
            'voucher_code' => [
                'string',
                'required',
            ],
            'value'        => [
                'required',
            ],
            'expired_time' => [
                'string',
                'nullable',
            ],
            'redeem_point' => [
                'numeric',
            ],
        ];
    }
}