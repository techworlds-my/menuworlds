@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.orderType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.order-types.update", [$orderType->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="type">{{ trans('cruds.orderType.fields.type') }}</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" id="type" value="{{ old('type', $orderType->type) }}" required>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderType.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="in_enable">{{ trans('cruds.orderType.fields.in_enable') }}</label>
                <input class="form-control {{ $errors->has('in_enable') ? 'is-invalid' : '' }}" type="text" name="in_enable" id="in_enable" value="{{ old('in_enable', $orderType->in_enable) }}" required>
                @if($errors->has('in_enable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('in_enable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.orderType.fields.in_enable_helper') }}</span>
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