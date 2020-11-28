<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoucherWalletRequest;
use App\Http\Requests\UpdateVoucherWalletRequest;
use App\Http\Resources\Admin\VoucherWalletResource;
use App\Models\VoucherWallet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VoucherWalletApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('voucher_wallet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VoucherWalletResource(VoucherWallet::with(['username', 'voucher'])->get());
    }

    public function store(StoreVoucherWalletRequest $request)
    {
        $voucherWallet = VoucherWallet::create($request->all());

        return (new VoucherWalletResource($voucherWallet))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VoucherWallet $voucherWallet)
    {
        abort_if(Gate::denies('voucher_wallet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VoucherWalletResource($voucherWallet->load(['username', 'voucher']));
    }

    public function update(UpdateVoucherWalletRequest $request, VoucherWallet $voucherWallet)
    {
        $voucherWallet->update($request->all());

        return (new VoucherWalletResource($voucherWallet))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VoucherWallet $voucherWallet)
    {
        abort_if(Gate::denies('voucher_wallet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherWallet->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
