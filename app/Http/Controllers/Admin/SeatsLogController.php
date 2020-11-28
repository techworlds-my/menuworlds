<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySeatsLogRequest;
use App\Http\Requests\StoreSeatsLogRequest;
use App\Http\Requests\UpdateSeatsLogRequest;
use App\Models\OrderManagement;
use App\Models\SeatsLog;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeatsLogController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('seats_log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seatsLogs = SeatsLog::with(['order'])->get();

        return view('admin.seatsLogs.index', compact('seatsLogs'));
    }

    public function create()
    {
        abort_if(Gate::denies('seats_log_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = OrderManagement::all()->pluck('order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.seatsLogs.create', compact('orders'));
    }

    public function store(StoreSeatsLogRequest $request)
    {
        $seatsLog = SeatsLog::create($request->all());

        return redirect()->route('admin.seats-logs.index');
    }

    public function edit(SeatsLog $seatsLog)
    {
        abort_if(Gate::denies('seats_log_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = OrderManagement::all()->pluck('order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $seatsLog->load('order');

        return view('admin.seatsLogs.edit', compact('orders', 'seatsLog'));
    }

    public function update(UpdateSeatsLogRequest $request, SeatsLog $seatsLog)
    {
        $seatsLog->update($request->all());

        return redirect()->route('admin.seats-logs.index');
    }

    public function show(SeatsLog $seatsLog)
    {
        abort_if(Gate::denies('seats_log_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seatsLog->load('order');

        return view('admin.seatsLogs.show', compact('seatsLog'));
    }

    public function destroy(SeatsLog $seatsLog)
    {
        abort_if(Gate::denies('seats_log_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seatsLog->delete();

        return back();
    }

    public function massDestroy(MassDestroySeatsLogRequest $request)
    {
        SeatsLog::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
