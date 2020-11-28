@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.voucherWallet.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.voucher-wallets.update", [$voucherWallet->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="username_id">{{ trans('cruds.voucherWallet.fields.username') }}</label>
                <select class="form-control select2 {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username_id" id="username_id">
                    @foreach($usernames as $id => $username)
                        <option value="{{ $id }}" {{ (old('username_id') ? old('username_id') : $voucherWallet->username->id ?? '') == $id ? 'selected' : '' }}>{{ $username }}</option>
                    @endforeach
                </select>
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherWallet.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_redeem') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_redeem" value="0">
                    <input class="form-check-input" type="checkbox" name="is_redeem" id="is_redeem" value="1" {{ $voucherWallet->is_redeem || old('is_redeem', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_redeem">{{ trans('cruds.voucherWallet.fields.is_redeem') }}</label>
                </div>
                @if($errors->has('is_redeem'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_redeem') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherWallet.fields.is_redeem_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="voucher_id">{{ trans('cruds.voucherWallet.fields.voucher') }}</label>
                <select class="form-control select2 {{ $errors->has('voucher') ? 'is-invalid' : '' }}" name="voucher_id" id="voucher_id">
                    @foreach($vouchers as $id => $voucher)
                        <option value="{{ $id }}" {{ (old('voucher_id') ? old('voucher_id') : $voucherWallet->voucher->id ?? '') == $id ? 'selected' : '' }}>{{ $voucher }}</option>
                    @endforeach
                </select>
                @if($errors->has('voucher'))
                    <div class="invalid-feedback">
                        {{ $errors->first('voucher') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherWallet.fields.voucher_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="usage">{{ trans('cruds.voucherWallet.fields.usage') }}</label>
                <input class="form-control {{ $errors->has('usage') ? 'is-invalid' : '' }}" type="text" name="usage" id="usage" value="{{ old('usage', $voucherWallet->usage) }}">
                @if($errors->has('usage'))
                    <div class="invalid-feedback">
                        {{ $errors->first('usage') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherWallet.fields.usage_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection