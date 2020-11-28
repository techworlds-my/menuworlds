<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVoucherReedemRequest;
use App\Http\Requests\UpdateVoucherReedemRequest;
use App\Http\Resources\Admin\VoucherReedemResource;
use App\Models\VoucherReedem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VoucherReedemApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('voucher_reedem_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VoucherReedemResource(VoucherReedem::with(['voucher_code', 'username', 'merchant'])->get());
    }

    public function store(StoreVoucherReedemRequest $request)
    {
        $voucherReedem = VoucherReedem::create($request->all());

        return (new VoucherReedemResource($voucherReedem))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(VoucherReedem $voucherReedem)
    {
        abort_if(Gate::denies('voucher_reedem_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VoucherReedemResource($voucherReedem->load(['voucher_code', 'username', 'merchant']));
    }

    public function update(UpdateVoucherReedemRequest $request, VoucherReedem $voucherReedem)
    {
        $voucherReedem->update($request->all());

        return (new VoucherReedemResource($voucherReedem))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(VoucherReedem $voucherReedem)
    {
        abort_if(Gate::denies('voucher_reedem_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $voucherReedem->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
