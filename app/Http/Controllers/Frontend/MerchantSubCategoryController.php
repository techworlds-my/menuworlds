<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMerchantSubCategoryRequest;
use App\Http\Requests\StoreMerchantSubCategoryRequest;
use App\Http\Requests\UpdateMerchantSubCategoryRequest;
use App\Models\MerchantCategory;
use App\Models\MerchantSubCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MerchantSubCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('merchant_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantSubCategories = MerchantSubCategory::with(['category', 'media'])->get();

        return view('frontend.merchantSubCategories.index', compact('merchantSubCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('merchant_sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = MerchantCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.merchantSubCategories.create', compact('categories'));
    }

    public function store(StoreMerchantSubCategoryRequest $request)
    {
        $merchantSubCategory = MerchantSubCategory::create($request->all());

        if ($request->input('image', false)) {
            $merchantSubCategory->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $merchantSubCategory->id]);
        }

        return redirect()->route('frontend.merchant-sub-categories.index');
    }

    public function edit(MerchantSubCategory $merchantSubCategory)
    {
        abort_if(Gate::denies('merchant_sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = MerchantCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchantSubCategory->load('category');

        return view('frontend.merchantSubCategories.edit', compact('categories', 'merchantSubCategory'));
    }

    public function update(UpdateMerchantSubCategoryRequest $request, MerchantSubCategory $merchantSubCategory)
    {
        $merchantSubCategory->update($request->all());

        if ($request->input('image', false)) {
            if (!$merchantSubCategory->image || $request->input('image') !== $merchantSubCategory->image->file_name) {
                if ($merchantSubCategory->image) {
                    $merchantSubCategory->image->delete();
                }

                $merchantSubCategory->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($merchantSubCategory->image) {
            $merchantSubCategory->image->delete();
        }

        return redirect()->route('frontend.merchant-sub-categories.index');
    }

    public function show(MerchantSubCategory $merchantSubCategory)
    {
        abort_if(Gate::denies('merchant_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantSubCategory->load('category');

        return view('frontend.merchantSubCategories.show', compact('merchantSubCategory'));
    }

    public function destroy(MerchantSubCategory $merchantSubCategory)
    {
        abort_if(Gate::denies('merchant_sub_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantSubCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyMerchantSubCategoryRequest $request)
    {
        MerchantSubCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('merchant_sub_category_create') && Gate::denies('merchant_sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MerchantSubCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
