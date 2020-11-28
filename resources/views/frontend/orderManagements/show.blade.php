@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.orderManagement.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.order-managements.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.order') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->order }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.username') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->username }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.price') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.delivery_charge') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->delivery_charge }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.tax') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->tax }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.total') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->total }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.comment') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->comment }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.merchant') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->merchant->company_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.payment_method') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->payment_method->method ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->status->status ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.voucher_used') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $orderManagement->voucher_used ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.voucher') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->voucher->voucher_code ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.orderManagement.fields.order_type') }}
                                    </th>
                                    <td>
                                        {{ $orderManagement->order_type->type ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.order-managements.index') }}">
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