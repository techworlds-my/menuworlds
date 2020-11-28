<?php

namespace App\Http\Requests;

use App\Models\VoucherWallet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVoucherWalletRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('voucher_wallet_edit');
    }

    public function rules()
    {
        return [
            'usage' => [
                'string',
                'nullable',
            ],
        ];
    }
}
