@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.orderItem.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.order-items.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $orderItem->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $orderItem->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $orderItem->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.order') }}
                                    </th>
                                    <td>
                                        {{ $orderItem->order->order ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.add_on') }}
                                    </th>
                                    <td>
                                        {{ $orderItem->add_on }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.add_on_price') }}
                                    </th>
                                    <td>
                                        {{ $orderItem->add_on_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderItem.fields.item') }}
                                    </th>
                                    <td>
                                        {{ $orderItem->item->title ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.order-items.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection