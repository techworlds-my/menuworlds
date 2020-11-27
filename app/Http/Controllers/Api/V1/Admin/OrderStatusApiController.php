<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderStatusRequest;
use App\Http\Requests\UpdateOrderStatusRequest;
use App\Http\Resources\Admin\OrderStatusResource;
use App\Models\OrderStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderStatusApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderStatusResource(OrderStatus::all());
    }

    public function store(StoreOrderStatusRequest $request)
    {
        $orderStatus = OrderStatus::create($request->all());

        return (new OrderStatusResource($orderStatus))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OrderStatus $orderStatus)
    {
        abort_if(Gate::denies('order_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderStatusResource($orderStatus);
    }

    public function update(UpdateOrderStatusRequest $request, OrderStatus $orderStatus)
    {
        $orderStatus->update($request->all());

        return (new OrderStatusResource($orderStatus))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OrderStatus $orderStatus)
    {
        abort_if(Gate::denies('order_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderStatus->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
