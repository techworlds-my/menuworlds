@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.voucherReedem.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.voucher-reedems.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.voucherReedem.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $voucherReedem->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.voucherReedem.fields.voucher_code') }}
                                    </th>
                                    <td>
                                        {{ $voucherReedem->voucher_code->voucher_code ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.voucherReedem.fields.username') }}
                                    </th>
                                    <td>
                                        {{ $voucherReedem->username->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.voucherReedem.fields.merchant') }}
                                    </th>
                                    <td>
                                        {{ $voucherReedem->merchant->company_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.voucherReedem.fields.redeem_date') }}
                                    </th>
                                    <td>
                                        {{ $voucherReedem->redeem_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.voucherReedem.fields.amount') }}
                                    </th>
                                    <td>
                                        {{ $voucherReedem->amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.voucherReedem.fields.type') }}
                                    </th>
                                    <td>
                                        {{ $voucherReedem->type }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.voucher-reedems.index') }}">
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