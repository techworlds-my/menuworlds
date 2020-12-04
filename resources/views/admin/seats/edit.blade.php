@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.seat.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.seats.update", [$seat->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('used') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="used" value="0">
                    <input class="form-check-input" type="checkbox" name="used" id="used" value="1" {{ $seat->used || old('used', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="used">{{ trans('cruds.seat.fields.used') }}</label>
                </div>
                @if($errors->has('used'))
                    <div class="invalid-feedback">
                        {{ $errors->first('used') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.seat.fields.used_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="time_start">{{ trans('cruds.seat.fields.time_start') }}</label>
                <input class="form-control datetime {{ $errors->has('time_start') ? 'is-invalid' : '' }}" type="text" name="time_start" id="time_start" value="{{ old('time_start', $seat->time_start) }}">
                @if($errors->has('time_start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time_start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.seat.fields.time_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="time_end">{{ trans('cruds.seat.fields.time_end') }}</label>
                <input class="form-control datetime {{ $errors->has('time_end') ? 'is-invalid' : '' }}" type="text" name="time_end" id="time_end" value="{{ old('time_end', $seat->time_end) }}">
                @if($errors->has('time_end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time_end') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.seat.fields.time_end_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="order_id">{{ trans('cruds.seat.fields.order') }}</label>
                <select class="form-control select2 {{ $errors->has('order') ? 'is-invalid' : '' }}" name="order_id" id="order_id">
                    @foreach($orders as $id => $order)
                        <option value="{{ $id }}" {{ (old('order_id') ? old('order_id') : $seat->order->id ?? '') == $id ? 'selected' : '' }}>{{ $order }}</option>
                    @endforeach
                </select>
                @if($errors->has('order'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.seat.fields.order_helper') }}</span>
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