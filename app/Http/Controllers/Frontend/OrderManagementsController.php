<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderManagementRequest;
use App\Http\Requests\StoreOrderManagementRequest;
use App\Http\Requests\UpdateOrderManagementRequest;
use App\Models\AddVoucher;
use App\Models\MerchantManagement;
use App\Models\OrderManagement;
use App\Models\OrderStatus;
use App\Models\OrderType;
use App\Models\PaymentMethod;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderManagementsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderManagements = OrderManagement::with(['merchant', 'payment_method', 'status', 'voucher', 'order_type'])->get();

        return view('frontend.orderManagements.index', compact('orderManagements'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_management_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_methods = PaymentMethod::all()->pluck('method', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = OrderStatus::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vouchers = AddVoucher::all()->pluck('voucher_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $order_types = OrderType::all()->pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.orderManagements.create', compact('merchants', 'payment_methods', 'statuses', 'vouchers', 'order_types'));
    }

    public function store(StoreOrderManagementRequest $request)
    {
        $orderManagement = OrderManagement::create($request->all());

        return redirect()->route('frontend.order-managements.index');
    }

    public function edit(OrderManagement $orderManagement)
    {
        abort_if(Gate::denies('order_management_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $merchants = MerchantManagement::all()->pluck('company_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_methods = PaymentMethod::all()->pluck('method', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = OrderStatus::all()->pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vouchers = AddVoucher::all()->pluck('voucher_code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $order_types = OrderType::all()->pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orderManagement->load('merchant', 'payment_method', 'status', 'voucher', 'order_type');

        return view('frontend.orderManagements.edit', compact('merchants', 'payment_methods', 'statuses', 'vouchers', 'order_types', 'orderManagement'));
    }

    public function update(UpdateOrderManagementRequest $request, OrderManagement $orderManagement)
    {
        $orderManagement->update($request->all());

        return redirect()->route('frontend.order-managements.index');
    }

    public function show(OrderManagement $orderManagement)
    {
        abort_if(Gate::denies('order_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderManagement->load('merchant', 'payment_method', 'status', 'voucher', 'order_type');

        return view('frontend.orderManagements.show', compact('orderManagement'));
    }

    public function destroy(OrderManagement $orderManagement)
    {
        abort_if(Gate::denies('order_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderManagement->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderManagementRequest $request)
    {
        OrderManagement::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
