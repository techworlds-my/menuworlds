<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMerchantCategoryRequest;
use App\Http\Requests\StoreMerchantCategoryRequest;
use App\Http\Requests\UpdateMerchantCategoryRequest;
use App\Models\MerchantCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MerchantCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('merchant_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantCategories = MerchantCategory::with(['media'])->get();

        return view('frontend.merchantCategories.index', compact('merchantCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('merchant_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.merchantCategories.create');
    }

    public function store(StoreMerchantCategoryRequest $request)
    {
        $merchantCategory = MerchantCategory::create($request->all());

        if ($request->input('image', false)) {
            $merchantCategory->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $merchantCategory->id]);
        }

        return redirect()->route('frontend.merchant-categories.index');
    }

    public function edit(MerchantCategory $merchantCategory)
    {
        abort_if(Gate::denies('merchant_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.merchantCategories.edit', compact('merchantCategory'));
    }

    public function update(UpdateMerchantCategoryRequest $request, MerchantCategory $merchantCategory)
    {
        $merchantCategory->update($request->all());

        if ($request->input('image', false)) {
            if (!$merchantCategory->image || $request->input('image') !== $merchantCategory->image->file_name) {
                if ($merchantCategory->image) {
                    $merchantCategory->image->delete();
                }

                $merchantCategory->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($merchantCategory->image) {
            $merchantCategory->image->delete();
        }

        return redirect()->route('frontend.merchant-categories.index');
    }

    public function show(MerchantCategory $merchantCategory)
    {
        abort_if(Gate::denies('merchant_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.merchantCategories.show', compact('merchantCategory'));
    }

    public function destroy(MerchantCategory $merchantCategory)
    {
        abort_if(Gate::denies('merchant_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyMerchantCategoryRequest $request)
    {
        MerchantCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('merchant_category_create') && Gate::denies('merchant_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MerchantCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
