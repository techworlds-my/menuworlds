<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderTypeRequest;
use App\Http\Requests\UpdateOrderTypeRequest;
use App\Http\Resources\Admin\OrderTypeResource;
use App\Models\OrderType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderTypeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderTypeResource(OrderType::all());
    }

    public function store(StoreOrderTypeRequest $request)
    {
        $orderType = OrderType::create($request->all());

        return (new OrderTypeResource($orderType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OrderType $orderType)
    {
        abort_if(Gate::denies('order_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderTypeResource($orderType);
    }

    public function update(UpdateOrderTypeRequest $request, OrderType $orderType)
    {
        $orderType->update($request->all());

        return (new OrderTypeResource($orderType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OrderType $orderType)
    {
        abort_if(Gate::denies('order_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
