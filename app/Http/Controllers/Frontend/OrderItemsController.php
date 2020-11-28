<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderItemRequest;
use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Models\ItemManagement;
use App\Models\OrderItem;
use App\Models\OrderManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderItemsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderItems = OrderItem::with(['order', 'item'])->get();

        $order_managements = OrderManagement::get();

        $item_managements = ItemManagement::get();

        return view('frontend.orderItems.index', compact('orderItems', 'order_managements', 'item_managements'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = OrderManagement::all()->pluck('order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $items = ItemManagement::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.orderItems.create', compact('orders', 'items'));
    }

    public function store(StoreOrderItemRequest $request)
    {
        $orderItem = OrderItem::create($request->all());

        return redirect()->route('frontend.order-items.index');
    }

    public function edit(OrderItem $orderItem)
    {
        abort_if(Gate::denies('order_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = OrderManagement::all()->pluck('order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $items = ItemManagement::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orderItem->load('order', 'item');

        return view('frontend.orderItems.edit', compact('orders', 'items', 'orderItem'));
    }

    public function update(UpdateOrderItemRequest $request, OrderItem $orderItem)
    {
        $orderItem->update($request->all());

        return redirect()->route('frontend.order-items.index');
    }

    public function show(OrderItem $orderItem)
    {
        abort_if(Gate::denies('order_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderItem->load('order', 'item');

        return view('frontend.orderItems.show', compact('orderItem'));
    }

    public function destroy(OrderItem $orderItem)
    {
        abort_if(Gate::denies('order_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderItemRequest $request)
    {
        OrderItem::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
