<?php

namespace App\Http\Requests;

use App\Models\VoucherWallet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVoucherWalletRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('voucher_wallet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:voucher_wallets,id',
        ];
    }
}
