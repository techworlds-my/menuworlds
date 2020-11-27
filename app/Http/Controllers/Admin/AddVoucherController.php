<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAddVoucherRequest;
use App\Http\Requests\StoreAddVoucherRequest;
use App\Http\Requests\UpdateAddVoucherRequest;
use App\Models\AddVoucher;
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

        $addVouchers = AddVoucher::all();

        return view('admin.addVouchers.index', compact('addVouchers'));
    }

    public function create()
    {
        abort_if(Gate::denies('add_voucher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addVouchers.create');
    }

    public function store(StoreAddVoucherRequest $request)
    {
        $addVoucher = AddVoucher::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $addVoucher->id]);
        }

        return redirect()->route('admin.add-vouchers.index');
    }

    public function edit(AddVoucher $addVoucher)
    {
        abort_if(Gate::denies('add_voucher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addVouchers.edit', compact('addVoucher'));
    }

    public function update(UpdateAddVoucherRequest $request, AddVoucher $addVoucher)
    {
        $addVoucher->update($request->all());

        return redirect()->route('admin.add-vouchers.index');
    }

    public function show(AddVoucher $addVoucher)
    {
        abort_if(Gate::denies('add_voucher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addVouchers.show', compact('addVoucher'));
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
