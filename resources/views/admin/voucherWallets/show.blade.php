@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.voucherWallet.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voucher-wallets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherWallet.fields.id') }}
                        </th>
                        <td>
                            {{ $voucherWallet->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherWallet.fields.username') }}
                        </th>
                        <td>
                            {{ $voucherWallet->username->company_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherWallet.fields.is_redeem') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $voucherWallet->is_redeem ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherWallet.fields.voucher') }}
                        </th>
                        <td>
                            {{ $voucherWallet->voucher->voucher_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.voucherWallet.fields.usage') }}
                        </th>
                        <td>
                            {{ $voucherWallet->usage }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.voucher-wallets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection