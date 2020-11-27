<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAddVoucherRequest;
use App\Http\Requests\StoreAddVoucherRequest;
use App\Http\Requests\UpdateAddVoucherRequest;
use App\Models\AddVoucher;
use App\Models\ItemManagement;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AddVoucherController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('add_voucher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addVouchers = AddVoucher::with(['select_items'])->get();

        return view('frontend.addVouchers.index', compact('addVouchers'));
    }

    public function create()
    {
        abort_if(Gate::denies('add_voucher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $select_items = ItemManagement::all()->pluck('title', 'id');

        return view('frontend.addVouchers.create', compact('select_items'));
    }

    public function store(StoreAddVoucherRequest $request)
    {
        $addVoucher = AddVoucher::create($request->all());
        $addVoucher->select_items()->sync($request->input('select_items', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $addVoucher->id]);
        }

        return redirect()->route('frontend.add-vouchers.index');
    }

    public function edit(AddVoucher $addVoucher)
    {
        abort_if(Gate::denies('add_voucher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $select_items = ItemManagement::all()->pluck('title', 'id');

        $addVoucher->load('select_items');

        return view('frontend.addVouchers.edit', compact('select_items', 'addVoucher'));
    }

    public function update(UpdateAddVoucherRequest $request, AddVoucher $addVoucher)
    {
        $addVoucher->update($request->all());
        $addVoucher->select_items()->sync($request->input('select_items', []));

        return redirect()->route('frontend.add-vouchers.index');
    }

    public function show(AddVoucher $addVoucher)
    {
        abort_if(Gate::denies('add_voucher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addVoucher->load('select_items');

        return view('frontend.addVouchers.show', compact('addVoucher'));
    }

    public function destroy(AddVoucher $addVoucher)
    {
        abort_if(Gate::denies('add_voucher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addVoucher->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddVoucherRequest $request)
    {
        AddVoucher::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('add_voucher_create') && Gate::denies('add_voucher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AddVoucher();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
