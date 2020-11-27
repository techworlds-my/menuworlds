<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMerchantCategoryRequest;
use App\Http\Requests\StoreMerchantCategoryRequest;
use App\Http\Requests\UpdateMerchantCategoryRequest;
use App\Models\MerchantCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MerchantCategoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('merchant_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MerchantCategory::query()->select(sprintf('%s.*', (new MerchantCategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'merchant_category_show';
                $editGate      = 'merchant_category_edit';
                $deleteGate    = 'merchant_category_delete';
                $crudRoutePart = 'merchant-categories';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('is_enable', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->is_enable ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'is_enable']);

            return $table->make(true);
        }

        return view('admin.merchantCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('merchant_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.merchantCategories.create');
    }

    public function store(StoreMerchantCategoryRequest $request)
    {
        $merchantCategory = MerchantCategory::create($request->all());

        return redirect()->route('admin.merchant-categories.index');
    }

    public function edit(MerchantCategory $merchantCategory)
    {
        abort_if(Gate::denies('merchant_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.merchantCategories.edit', compact('merchantCategory'));
    }

    public function update(UpdateMerchantCategoryRequest $request, MerchantCategory $merchantCategory)
    {
        $merchantCategory->update($request->all());

        return redirect()->route('admin.merchant-categories.index');
    }

    public function show(MerchantCategory $merchantCategory)
    {
        abort_if(Gate::denies('merchant_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.merchantCategories.show', compact('merchantCategory'));
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
}
