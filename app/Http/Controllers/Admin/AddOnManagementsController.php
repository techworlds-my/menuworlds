<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddOnManagementRequest;
use App\Http\Requests\StoreAddOnManagementRequest;
use App\Http\Requests\UpdateAddOnManagementRequest;
use App\Models\AddOnCategory;
use App\Models\AddOnManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddOnManagementsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('add_on_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addOnManagements = AddOnManagement::with(['category'])->get();

        return view('admin.addOnManagements.index', compact('addOnManagements'));
    }

    public function create()
    {
        abort_if(Gate::denies('add_on_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = AddOnCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.addOnManagements.create', compact('categories'));
    }

    public function store(StoreAddOnManagementRequest $request)
    {
        $addOnManagement = AddOnManagement::create($request->all());

        return redirect()->route('admin.add-on-managements.index');
    }

    public function edit(AddOnManagement $addOnManagement)
    {
        abort_if(Gate::denies('add_on_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = AddOnCategory::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $addOnManagement->load('category');

        return view('admin.addOnManagements.edit', compact('categories', 'addOnManagement'));
    }

    public function update(UpdateAddOnManagementRequest $request, AddOnManagement $addOnManagement)
    {
        $addOnManagement->update($request->all());

        return redirect()->route('admin.add-on-managements.index');
    }

    public function show(AddOnManagement $addOnManagement)
    {
        abort_if(Gate::denies('add_on_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addOnManagement->load('category');

        return view('admin.addOnManagements.show', compact('addOnManagement'));
    }

    public function destroy(AddOnManagement $addOnManagement)
    {
        abort_if(Gate::denies('add_on_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $addOnManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyAddOnManagementRequest $request)
    {
        AddOnManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
