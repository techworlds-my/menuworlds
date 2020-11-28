@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.itemCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.item-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.itemCategory.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.itemCategory.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_enable') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_enable" value="0">
                    <input class="form-check-input" type="checkbox" name="is_enable" id="is_enable" value="1" {{ old('is_enable', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_enable">{{ trans('cruds.itemCategory.fields.is_enable') }}</label>
                </div>
                @if($errors->has('is_enable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_enable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.itemCategory.fields.is_enable_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="merchant_id">{{ trans('cruds.itemCategory.fields.merchant') }}</label>
                <select class="form-control select2 {{ $errors->has('merchant') ? 'is-invalid' : '' }}" name="merchant_id" id="merchant_id">
                    @foreach($merchants as $id => $merchant)
                        <option value="{{ $id }}" {{ old('merchant_id') == $id ? 'selected' : '' }}>{{ $merchant }}</option>
                    @endforeach
                </select>
                @if($errors->has('merchant'))
                    <div class="invalid-feedback">
                        {{ $errors->first('merchant') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.itemCategory.fields.merchant_helper') }}</span>
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