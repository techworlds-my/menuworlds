<?php

namespace App\Http\Requests;

use App\Models\VoucherReedem;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVoucherReedemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('voucher_reedem_edit');
    }

    public function rules()
    {
        return [
            'redeem_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'amount'      => [
                'numeric',
            ],
            'type'        => [
                'string',
                'nullable',
            ],
        ];
    }
}
