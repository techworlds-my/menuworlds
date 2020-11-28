@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.seatsManagement.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.seats-managements.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('used') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="used" value="0">
                    <input class="form-check-input" type="checkbox" name="used" id="used" value="1" {{ old('used', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="used">{{ trans('cruds.seatsManagement.fields.used') }}</label>
                </div>
                @if($errors->has('used'))
                    <div class="invalid-feedback">
                        {{ $errors->first('used') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.seatsManagement.fields.used_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="time_start">{{ trans('cruds.seatsManagement.fields.time_start') }}</label>
                <input class="form-control datetime {{ $errors->has('time_start') ? 'is-invalid' : '' }}" type="text" name="time_start" id="time_start" value="{{ old('time_start') }}">
                @if($errors->has('time_start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time_start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.seatsManagement.fields.time_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="time_end">{{ trans('cruds.seatsManagement.fields.time_end') }}</label>
                <input class="form-control datetime {{ $errors->has('time_end') ? 'is-invalid' : '' }}" type="text" name="time_end" id="time_end" value="{{ old('time_end') }}">
                @if($errors->has('time_end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('time_end') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.seatsManagement.fields.time_end_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="order_id">{{ trans('cruds.seatsManagement.fields.order') }}</label>
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
                <span class="help-block">{{ trans('cruds.seatsManagement.fields.order_helper') }}</span>
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