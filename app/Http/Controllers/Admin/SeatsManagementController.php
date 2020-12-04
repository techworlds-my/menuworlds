<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySeatsManagementRequest;
use App\Http\Requests\StoreSeatsManagementRequest;
use App\Http\Requests\UpdateSeatsManagementRequest;
use App\Models\OrderManagement;
use App\Models\SeatsManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeatsManagementController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('seats_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seatsManagements = SeatsManagement::with(['order'])->get();

        return view('admin.seatsManagements.index', compact('seatsManagements'));
    }

    public function create()
    {
        abort_if(Gate::denies('seats_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = OrderManagement::all()->pluck('order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.seatsManagements.create', compact('orders'));
    }

    public function store(StoreSeatsManagementRequest $request)
    {
        $seatsManagement = SeatsManagement::create($request->all());

        return redirect()->route('admin.seats-managements.index');
    }

    public function edit(SeatsManagement $seatsManagement)
    {
        abort_if(Gate::denies('seats_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = OrderManagement::all()->pluck('order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $seatsManagement->load('order');

        return view('admin.seatsManagements.edit', compact('orders', 'seatsManagement'));
    }

    public function update(UpdateSeatsManagementRequest $request, SeatsManagement $seatsManagement)
    {
        $seatsManagement->update($request->all());

        return redirect()->route('admin.seats-managements.index');
    }

    public function show(SeatsManagement $seatsManagement)
    {
        abort_if(Gate::denies('seats_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seatsManagement->load('order');

        return view('admin.seatsManagements.show', compact('seatsManagement'));
    }

    public function destroy(SeatsManagement $seatsManagement)
    {
        abort_if(Gate::denies('seats_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seatsManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroySeatsManagementRequest $request)
    {
        SeatsManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
