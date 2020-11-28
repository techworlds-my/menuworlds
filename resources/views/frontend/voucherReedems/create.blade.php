@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.voucherReedem.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.voucher-reedems.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="voucher_code_id">{{ trans('cruds.voucherReedem.fields.voucher_code') }}</label>
                            <select class="form-control select2" name="voucher_code_id" id="voucher_code_id">
                                @foreach($voucher_codes as $id => $voucher_code)
                                    <option value="{{ $id }}" {{ old('voucher_code_id') == $id ? 'selected' : '' }}>{{ $voucher_code }}</option>
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
                            <select class="form-control select2" name="username_id" id="username_id">
                                @foreach($usernames as $id => $username)
                                    <option value="{{ $id }}" {{ old('username_id') == $id ? 'selected' : '' }}>{{ $username }}</option>
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
                            <select class="form-control select2" name="merchant_id" id="merchant_id">
                                @foreach($merchants as $id => $merchant)
                                    <option value="{{ $id }}" {{ old('merchant_id') == $id ? 'selected' : '' }}>{{ $merchant }}</option>
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
                            <input class="form-control datetime" type="text" name="redeem_date" id="redeem_date" value="{{ old('redeem_date') }}">
                            @if($errors->has('redeem_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('redeem_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.voucherReedem.fields.redeem_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="amount">{{ trans('cruds.voucherReedem.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01">
                            @if($errors->has('amount'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.voucherReedem.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="type">{{ trans('cruds.voucherReedem.fields.type') }}</label>
                            <input class="form-control" type="text" name="type" id="type" value="{{ old('type', '') }}">
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

        </div>
    </div>
</div>
@endsection