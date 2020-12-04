@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.orderItem.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.order-items.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.orderItem.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="number" name="quantity" id="quantity" value="{{ old('quantity', '') }}" step="1">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.quantity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.orderItem.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="order_id">{{ trans('cruds.orderItem.fields.order') }}</label>
                <select class="form-control select2 {{ $errors->has('order') ? 'is-invalid' : '' }}" name="order_id" id="order_id">
                    @foreach($orders as $id => $order)
                        <option value="{{ $id }}" {{ old('order_id') == $id ? 'selected' : '' }}>{{ $order }}</option>
                    @endforeach
                </select>
                @if($errors->has('order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.order_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="add_on">{{ trans('cruds.orderItem.fields.add_on') }}</label>
                <input class="form-control {{ $errors->has('add_on') ? 'is-invalid' : '' }}" type="text" name="add_on" id="add_on" value="{{ old('add_on', '') }}">
                @if($errors->has('add_on'))
                    <div class="invalid-feedback">
                        {{ $errors->first('add_on') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.add_on_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="add_on_price">{{ trans('cruds.orderItem.fields.add_on_price') }}</label>
                <input class="form-control {{ $errors->has('add_on_price') ? 'is-invalid' : '' }}" type="number" name="add_on_price" id="add_on_price" value="{{ old('add_on_price', '') }}" step="0.01">
                @if($errors->has('add_on_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('add_on_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.add_on_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="item_id">{{ trans('cruds.orderItem.fields.item') }}</label>
                <select class="form-control select2 {{ $errors->has('item') ? 'is-invalid' : '' }}" name="item_id" id="item_id">
                    @foreach($items as $id => $item)
                        <option value="{{ $id }}" {{ old('item_id') == $id ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </select>
                @if($errors->has('item'))
                    <div class="invalid-feedback">
                        {{ $errors->first('item') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderItem.fields.item_helper') }}</span>
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