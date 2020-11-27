@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.orderManagement.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.order-managements.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="order">{{ trans('cruds.orderManagement.fields.order') }}</label>
                            <input class="form-control" type="text" name="order" id="order" value="{{ old('order', '') }}" required>
                            @if($errors->has('order'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('order') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderManagement.fields.order_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="username">{{ trans('cruds.orderManagement.fields.username') }}</label>
                            <input class="form-control" type="text" name="username" id="username" value="{{ old('username', '') }}" required>
                            @if($errors->has('username'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('username') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderManagement.fields.username_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="address">{{ trans('cruds.orderManagement.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}" required>
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderManagement.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="price">{{ trans('cruds.orderManagement.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                            @if($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderManagement.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="delivery_charge">{{ trans('cruds.orderManagement.fields.delivery_charge') }}</label>
                            <input class="form-control" type="number" name="delivery_charge" id="delivery_charge" value="{{ old('delivery_charge', '') }}" step="0.01">
                            @if($errors->has('delivery_charge'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('delivery_charge') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderManagement.fields.delivery_charge_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="tax">{{ trans('cruds.orderManagement.fields.tax') }}</label>
                            <input class="form-control" type="number" name="tax" id="tax" value="{{ old('tax', '') }}" step="0.01">
                            @if($errors->has('tax'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('tax') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderManagement.fields.tax_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="total">{{ trans('cruds.orderManagement.fields.total') }}</label>
                            <input class="form-control" type="number" name="total" id="total" value="{{ old('total', '') }}" step="0.01" required>
                            @if($errors->has('total'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('total') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderManagement.fields.total_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="comment">{{ trans('cruds.orderManagement.fields.comment') }}</label>
                            <input class="form-control" type="text" name="comment" id="comment" value="{{ old('comment', '') }}">
                            @if($errors->has('comment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('comment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderManagement.fields.comment_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="merchant_id">{{ trans('cruds.orderManagement.fields.merchant') }}</label>
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
                            <span class="help-block">{{ trans('cruds.orderManagement.fields.merchant_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="payment_method_id">{{ trans('cruds.orderManagement.fields.payment_method') }}</label>
                            <select class="form-control select2" name="payment_method_id" id="payment_method_id">
                                @foreach($payment_methods as $id => $payment_method)
                                    <option value="{{ $id }}" {{ old('payment_method_id') == $id ? 'selected' : '' }}>{{ $payment_method }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payment_method'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('payment_method') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderManagement.fields.payment_method_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status_id">{{ trans('cruds.orderManagement.fields.status') }}</label>
                            <select class="form-control select2" name="status_id" id="status_id">
                                @foreach($statuses as $id => $status)
                                    <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderManagement.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="voucher_used" value="0">
                                <input type="checkbox" name="voucher_used" id="voucher_used" value="1" {{ old('voucher_used', 0) == 1 ? 'checked' : '' }}>
                                <label for="voucher_used">{{ trans('cruds.orderManagement.fields.voucher_used') }}</label>
                            </div>
                            @if($errors->has('voucher_used'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('voucher_used') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderManagement.fields.voucher_used_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="voucher_id">{{ trans('cruds.orderManagement.fields.voucher') }}</label>
                            <select class="form-control select2" name="voucher_id" id="voucher_id">
                                @foreach($vouchers as $id => $voucher)
                                    <option value="{{ $id }}" {{ old('voucher_id') == $id ? 'selected' : '' }}>{{ $voucher }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('voucher'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('voucher') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderManagement.fields.voucher_helper') }}</span>
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