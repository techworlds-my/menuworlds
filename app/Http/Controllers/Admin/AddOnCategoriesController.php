<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddOnCategoryRequest;
use App\Http\Requests\StoreAddOnCategoryRequest;
use App\Http\Requests\UpdateAddOnCategoryRequest;
use App\Models\AddOnCategory;
use App\Models\MerchantManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddOnCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('add_on_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addOnCategories = AddOnCategory::with(['created_by'])->get();

        return view('admin.addOnCategories.index', compact('addOnCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('add_on_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addOnCategories.create', compact('created_bies'));
    }

    public function store(StoreAddOnCategoryRequest $request)
    {
        $addOnCategory = AddOnCategory::create($request->all());

        return redirect()->route('admin.add-on-categories.index');
    }

    public function edit(AddOnCategory $addOnCategory)
    {
        abort_if(Gate::denies('add_on_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addOnCategory->load('created_by');

        return view('admin.addOnCategories.edit', compact('created_bies', 'addOnCategory'));
    }

    public function update(UpdateAddOnCategoryRequest $request, AddOnCategory $addOnCategory)
    {
        $addOnCategory->update($request->all());

        return redirect()->route('admin.add-on-categories.index');
    }

    public function show(AddOnCategory $addOnCategory)
    {
        abort_if(Gate::denies('add_on_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addOnCategory->load('created_by');

        return view('admin.addOnCategories.show', compact('addOnCategory'));
    }

    public function destroy(AddOnCategory $addOnCategory)
    {
        abort_if(Gate::denies('add_on_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addOnCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddOnCategoryRequest $request)
    {
        AddOnCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
