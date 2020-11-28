@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.voucherReedem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.voucher-reedems.update", [$voucherReedem->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="voucher_code_id">{{ trans('cruds.voucherReedem.fields.voucher_code') }}</label>
                <select class="form-control select2 {{ $errors->has('voucher_code') ? 'is-invalid' : '' }}" name="voucher_code_id" id="voucher_code_id">
                    @foreach($voucher_codes as $id => $voucher_code)
                        <option value="{{ $id }}" {{ (old('voucher_code_id') ? old('voucher_code_id') : $voucherReedem->voucher_code->id ?? '') == $id ? 'selected' : '' }}>{{ $voucher_code }}</option>
                    @endforeach
                </select>
                @if($errors->has('voucher_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('voucher_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherReedem.fields.voucher_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="username_id">{{ trans('cruds.voucherReedem.fields.username') }}</label>
                <select class="form-control select2 {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username_id" id="username_id">
                    @foreach($usernames as $id => $username)
                        <option value="{{ $id }}" {{ (old('username_id') ? old('username_id') : $voucherReedem->username->id ?? '') == $id ? 'selected' : '' }}>{{ $username }}</option>
                    @endforeach
                </select>
                @if($errors->has('username'))
                    <div class="invalid-feedback">
                        {{ $errors->first('username') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherReedem.fields.username_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="merchant_id">{{ trans('cruds.voucherReedem.fields.merchant') }}</label>
                <select class="form-control select2 {{ $errors->has('merchant') ? 'is-invalid' : '' }}" name="merchant_id" id="merchant_id">
                    @foreach($merchants as $id => $merchant)
                        <option value="{{ $id }}" {{ (old('merchant_id') ? old('merchant_id') : $voucherReedem->merchant->id ?? '') == $id ? 'selected' : '' }}>{{ $merchant }}</option>
                    @endforeach
                </select>
                @if($errors->has('merchant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('merchant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherReedem.fields.merchant_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="redeem_date">{{ trans('cruds.voucherReedem.fields.redeem_date') }}</label>
                <input class="form-control datetime {{ $errors->has('redeem_date') ? 'is-invalid' : '' }}" type="text" name="redeem_date" id="redeem_date" value="{{ old('redeem_date', $voucherReedem->redeem_date) }}">
                @if($errors->has('redeem_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('redeem_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherReedem.fields.redeem_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount">{{ trans('cruds.voucherReedem.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $voucherReedem->amount) }}" step="0.01">
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherReedem.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="type">{{ trans('cruds.voucherReedem.fields.type') }}</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" id="type" value="{{ old('type', $voucherReedem->type) }}">
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.voucherReedem.fields.type_helper') }}</span>
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