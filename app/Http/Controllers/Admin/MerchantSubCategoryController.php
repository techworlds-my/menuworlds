<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMerchantSubCategoryRequest;
use App\Http\Requests\StoreMerchantSubCategoryRequest;
use App\Http\Requests\UpdateMerchantSubCategoryRequest;
use App\Models\MerchantCategory;
use App\Models\MerchantSubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MerchantSubCategoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('merchant_sub_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MerchantSubCategory::with(['category'])->select(sprintf('%s.*', (new MerchantSubCategory)->table));
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

            $table->rawColumns(['actions', 'placeholder', 'in_enable', 'category']);

            return $table->make(true);
        }

        return view('admin.merchantSubCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('merchant_sub_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = MerchantCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.merchantSubCategories.create', compact('categories'));
    }

    public function store(StoreMerchantSubCategoryRequest $request)
    {
        $merchantSubCategory = MerchantSubCategory::create($request->all());

        return redirect()->route('admin.merchant-sub-categories.index');
    }

    public function edit(MerchantSubCategory $merchantSubCategory)
    {
        abort_if(Gate::denies('merchant_sub_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = MerchantCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $merchantSubCategory->load('category');

        return view('admin.merchantSubCategories.edit', compact('categories', 'merchantSubCategory'));
    }

    public function update(UpdateMerchantSubCategoryRequest $request, MerchantSubCategory $merchantSubCategory)
    {
        $merchantSubCategory->update($request->all());

        return redirect()->route('admin.merchant-sub-categories.index');
    }

    public function show(MerchantSubCategory $merchantSubCategory)
    {
        abort_if(Gate::denies('merchant_sub_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchantSubCategory->load('category');

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
}
