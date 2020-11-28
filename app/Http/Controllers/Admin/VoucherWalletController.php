<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVoucherWalletRequest;
use App\Http\Requests\StoreVoucherWalletRequest;
use App\Http\Requests\UpdateVoucherWalletRequest;
use App\Models\AddVoucher;
use App\Models\MerchantManagement;
use App\Models\VoucherWallet;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VoucherWalletController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('voucher_wallet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherWallets = VoucherWallet::with(['username', 'voucher'])->get();

        return view('admin.voucherWallets.index', compact('voucherWallets'));
    }

    public function create()
    {
        abort_if(Gate::denies('voucher_wallet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usernames = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vouchers = AddVoucher::all()->pluck('voucher_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.voucherWallets.create', compact('usernames', 'vouchers'));
    }

    public function store(StoreVoucherWalletRequest $request)
    {
        $voucherWallet = VoucherWallet::create($request->all());

        return redirect()->route('admin.voucher-wallets.index');
    }

    public function edit(VoucherWallet $voucherWallet)
    {
        abort_if(Gate::denies('voucher_wallet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $usernames = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vouchers = AddVoucher::all()->pluck('voucher_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $voucherWallet->load('username', 'voucher');

        return view('admin.voucherWallets.edit', compact('usernames', 'vouchers', 'voucherWallet'));
    }

    public function update(UpdateVoucherWalletRequest $request, VoucherWallet $voucherWallet)
    {
        $voucherWallet->update($request->all());

        return redirect()->route('admin.voucher-wallets.index');
    }

    public function show(VoucherWallet $voucherWallet)
    {
        abort_if(Gate::denies('voucher_wallet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherWallet->load('username', 'voucher');

        return view('admin.voucherWallets.show', compact('voucherWallet'));
    }

    public function destroy(VoucherWallet $voucherWallet)
    {
        abort_if(Gate::denies('voucher_wallet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherWallet->delete();

        return back();
    }

    public function massDestroy(MassDestroyVoucherWalletRequest $request)
    {
        VoucherWallet::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
