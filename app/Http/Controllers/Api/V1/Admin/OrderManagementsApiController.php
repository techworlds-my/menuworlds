<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderManagementRequest;
use App\Http\Requests\UpdateOrderManagementRequest;
use App\Http\Resources\Admin\OrderManagementResource;
use App\Models\OrderManagement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderManagementsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderManagementResource(OrderManagement::with(['merchant', 'payment_method', 'status', 'voucher', 'order_type'])->get());
    }

    public function store(StoreOrderManagementRequest $request)
    {
        $orderManagement = OrderManagement::create($request->all());

        return (new OrderManagementResource($orderManagement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OrderManagement $orderManagement)
    {
        abort_if(Gate::denies('order_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderManagementResource($orderManagement->load(['merchant', 'payment_method', 'status', 'voucher', 'order_type']));
    }

    public function update(UpdateOrderManagementRequest $request, OrderManagement $orderManagement)
    {
        $orderManagement->update($request->all());

        return (new OrderManagementResource($orderManagement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OrderManagement $orderManagement)
    {
        abort_if(Gate::denies('order_management_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderManagement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

        
    public function filter_by_merchant_id(int $id)
    {
        abort_if(Gate::denies('order_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderManagementResource(OrderManagement::with(['merchant', 'payment_method', 'status', 'voucher', 'order_type'])->get()->where('merchant_id',$id));
    }
    
     public function filter_by_merchant_id_status(int $id,$status)
    {
        abort_if(Gate::denies('order_management_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrderManagementResource(OrderManagement::with(['merchant', 'payment_method', 'status', 'voucher', 'order_type'])->get()->where('merchant_id',$id)>where('status_id',$status));
    }
    
        public function filter_by_username($username)
        {
            abort_if(Gate::denies('order_management_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            
            return new OrderManagementResource(OrderManagement::with(['status', 'paymentmethod'])->get()->where('username',$username));
        }
}
