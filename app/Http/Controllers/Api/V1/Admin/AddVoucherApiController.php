<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAddVoucherRequest;
use App\Http\Requests\UpdateAddVoucherRequest;
use App\Http\Resources\Admin\AddVoucherResource;
use App\Models\AddVoucher;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddVoucherApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_voucher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddVoucherResource(AddVoucher::with(['select_items', 'merchant', 'categories', 'sub_categories'])->get());
    }

    public function store(StoreAddVoucherRequest $request)
    {
        $addVoucher = AddVoucher::create($request->all());
        $addVoucher->select_items()->sync($request->input('select_items', []));
        $addVoucher->categories()->sync($request->input('categories', []));
        $addVoucher->sub_categories()->sync($request->input('sub_categories', []));

        return (new AddVoucherResource($addVoucher))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AddVoucher $addVoucher)
    {
        abort_if(Gate::denies('add_voucher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AddVoucherResource($addVoucher->load(['select_items', 'merchant', 'categories', 'sub_categories']));
    }

    public function update(UpdateAddVoucherRequest $request, AddVoucher $addVoucher)
    {
        $addVoucher->update($request->all());
        $addVoucher->select_items()->sync($request->input('select_items', []));
        $addVoucher->categories()->sync($request->input('categories', []));
        $addVoucher->sub_categories()->sync($request->input('sub_categories', []));

        return (new AddVoucherResource($addVoucher))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AddVoucher $addVoucher)
    {
        abort_if(Gate::denies('add_voucher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addVoucher->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
