@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.addVoucher.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.add-vouchers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $addVoucher->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.voucher_code') }}
                                    </th>
                                    <td>
                                        {{ $addVoucher->voucher_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.discount_type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\AddVoucher::DISCOUNT_TYPE_SELECT[$addVoucher->discount_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.value') }}
                                    </th>
                                    <td>
                                        {{ $addVoucher->value }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $addVoucher->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.redeem_point') }}
                                    </th>
                                    <td>
                                        {{ $addVoucher->redeem_point }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.is_free_shipping') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $addVoucher->is_free_shipping ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.is_credit_purchase') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $addVoucher->is_credit_purchase ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.expired_time') }}
                                    </th>
                                    <td>
                                        {{ $addVoucher->expired_time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.select_item') }}
                                    </th>
                                    <td>
                                        @foreach($addVoucher->select_items as $key => $select_item)
                                            <span class="label label-info">{{ $select_item->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.min_spend') }}
                                    </th>
                                    <td>
                                        {{ $addVoucher->min_spend }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.max_spend') }}
                                    </th>
                                    <td>
                                        {{ $addVoucher->max_spend }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.excluded_sales_item') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $addVoucher->excluded_sales_item ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.usage_limit') }}
                                    </th>
                                    <td>
                                        {{ $addVoucher->usage_limit }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.limit_per_user') }}
                                    </th>
                                    <td>
                                        {{ $addVoucher->limit_per_user }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.merchant') }}
                                    </th>
                                    <td>
                                        {{ $addVoucher->merchant->company_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.category') }}
                                    </th>
                                    <td>
                                        @foreach($addVoucher->categories as $key => $category)
                                            <span class="label label-info">{{ $category->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addVoucher.fields.sub_category') }}
                                    </th>
                                    <td>
                                        @foreach($addVoucher->sub_categories as $key => $sub_category)
                                            <span class="label label-info">{{ $sub_category->title }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.add-vouchers.index') }}">
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