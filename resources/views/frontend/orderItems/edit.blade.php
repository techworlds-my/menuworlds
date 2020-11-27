@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.orderItem.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.order-items.update", [$orderItem->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="item_id">{{ trans('cruds.orderItem.fields.item') }}</label>
                            <select class="form-control select2" name="item_id" id="item_id">
                                @foreach($items as $id => $item)
                                    <option value="{{ $id }}" {{ (old('item_id') ? old('item_id') : $orderItem->item->id ?? '') == $id ? 'selected' : '' }}>{{ $item }}</option>
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
                            <label for="quantity">{{ trans('cruds.orderItem.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', $orderItem->quantity) }}" step="1">
                            @if($errors->has('quantity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('quantity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderItem.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="add_on" value="0">
                                <input type="checkbox" name="add_on" id="add_on" value="1" {{ $orderItem->add_on || old('add_on', 0) === 1 ? 'checked' : '' }}>
                                <label for="add_on">{{ trans('cruds.orderItem.fields.add_on') }}</label>
                            </div>
                            @if($errors->has('add_on'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('add_on') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.orderItem.fields.add_on_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="order_id">{{ trans('cruds.orderItem.fields.order') }}</label>
                            <select class="form-control select2" name="order_id" id="order_id">
                                @foreach($orders as $id => $order)
                                    <option value="{{ $id }}" {{ (old('order_id') ? old('order_id') : $orderItem->order->id ?? '') == $id ? 'selected' : '' }}>{{ $order }}</option>
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