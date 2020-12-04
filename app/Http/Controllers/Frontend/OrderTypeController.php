<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderTypeRequest;
use App\Http\Requests\StoreOrderTypeRequest;
use App\Http\Requests\UpdateOrderTypeRequest;
use App\Models\OrderType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderTypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderTypes = OrderType::all();

        return view('frontend.orderTypes.index', compact('orderTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.orderTypes.create');
    }

    public function store(StoreOrderTypeRequest $request)
    {
        $orderType = OrderType::create($request->all());

        return redirect()->route('frontend.order-types.index');
    }

    public function edit(OrderType $orderType)
    {
        abort_if(Gate::denies('order_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.orderTypes.edit', compact('orderType'));
    }

    public function update(UpdateOrderTypeRequest $request, OrderType $orderType)
    {
        $orderType->update($request->all());

        return redirect()->route('frontend.order-types.index');
    }

    public function show(OrderType $orderType)
    {
        abort_if(Gate::denies('order_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.orderTypes.show', compact('orderType'));
    }

    public function destroy(OrderType $orderType)
    {
        abort_if(Gate::denies('order_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderType->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderTypeRequest $request)
    {
        OrderType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
