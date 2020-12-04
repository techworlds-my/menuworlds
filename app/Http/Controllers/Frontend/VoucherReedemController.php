<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVoucherReedemRequest;
use App\Http\Requests\StoreVoucherReedemRequest;
use App\Http\Requests\UpdateVoucherReedemRequest;
use App\Models\AddVoucher;
use App\Models\MerchantManagement;
use App\Models\User;
use App\Models\VoucherReedem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VoucherReedemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('voucher_reedem_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherReedems = VoucherReedem::with(['voucher_code', 'username', 'merchant'])->get();

        return view('frontend.voucherReedems.index', compact('voucherReedems'));
    }

    public function create()
    {
        abort_if(Gate::denies('voucher_reedem_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucher_codes = AddVoucher::all()->pluck('voucher_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $usernames = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.voucherReedems.create', compact('voucher_codes', 'usernames', 'merchants'));
    }

    public function store(StoreVoucherReedemRequest $request)
    {
        $voucherReedem = VoucherReedem::create($request->all());

        return redirect()->route('frontend.voucher-reedems.index');
    }

    public function edit(VoucherReedem $voucherReedem)
    {
        abort_if(Gate::denies('voucher_reedem_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucher_codes = AddVoucher::all()->pluck('voucher_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $usernames = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $voucherReedem->load('voucher_code', 'username', 'merchant');

        return view('frontend.voucherReedems.edit', compact('voucher_codes', 'usernames', 'merchants', 'voucherReedem'));
    }

    public function update(UpdateVoucherReedemRequest $request, VoucherReedem $voucherReedem)
    {
        $voucherReedem->update($request->all());

        return redirect()->route('frontend.voucher-reedems.index');
    }

    public function show(VoucherReedem $voucherReedem)
    {
        abort_if(Gate::denies('voucher_reedem_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherReedem->load('voucher_code', 'username', 'merchant');

        return view('frontend.voucherReedems.show', compact('voucherReedem'));
    }

    public function destroy(VoucherReedem $voucherReedem)
    {
        abort_if(Gate::denies('voucher_reedem_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherReedem->delete();

        return back();
    }

    public function massDestroy(MassDestroyVoucherReedemRequest $request)
    {
        VoucherReedem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
