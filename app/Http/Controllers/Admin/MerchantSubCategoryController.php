<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class MerchantSubCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('merchant_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MerchantSubCategory::with(['category', 'parent'])->select(sprintf('%s.*', (new MerchantSubCategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'merchant_sub_category_show';
                $editGate      = 'merchant_sub_category_edit';
                $deleteGate    = 'merchant_sub_category_delete';
                $crudRoutePart = 'merchant-sub-categories';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('sub_category', function ($row) {
                return $row->sub_category ? $row->sub_category : "";
            });
            $table->editColumn('in_enable', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->in_enable ? 'checked' : null) . '>';
            });
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->editColumn('category.is_enable', function ($row) {
                return $row->category ? (is_string($row->category) ? $row->category : $row->category->is_enable) : '';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->addColumn('parent_sub_category', function ($row) {
                return $row->parent ? $row->parent->sub_category : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'in_enable', 'category', 'image', 'parent']);

            return $table->make(true);
        }

        return view('admin.merchantSubCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('merchant_sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = MerchantCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parents = MerchantSubCategory::all()->pluck('sub_category', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.merchantSubCategories.create', compact('categories', 'parents'));
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

        return redirect()->route('admin.merchant-sub-categories.index');
    }

    public function edit(MerchantSubCategory $merchantSubCategory)
    {
        abort_if(Gate::denies('merchant_sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = MerchantCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parents = MerchantSubCategory::all()->pluck('sub_category', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchantSubCategory->load('category', 'parent');

        return view('admin.merchantSubCategories.edit', compact('categories', 'parents', 'merchantSubCategory'));
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

        return redirect()->route('admin.merchant-sub-categories.index');
    }

    public function show(MerchantSubCategory $merchantSubCategory)
    {
        abort_if(Gate::denies('merchant_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantSubCategory->load('category', 'parent');

        return view('admin.merchantSubCategories.show', compact('merchantSubCategory'));
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
