@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.addOnCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.add-on-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.addOnCategory.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addOnCategory.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_enable') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_enable" id="is_enable" value="1" required {{ old('is_enable', 0) == 1 || old('is_enable') === null ? 'checked' : '' }}>
                    <label class="required form-check-label" for="is_enable">{{ trans('cruds.addOnCategory.fields.is_enable') }}</label>
                </div>
                @if($errors->has('is_enable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_enable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addOnCategory.fields.is_enable_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_by_id">{{ trans('cruds.addOnCategory.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id">
                    @foreach($created_bies as $id => $created_by)
                        <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>{{ $created_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('created_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.addOnCategory.fields.created_by_helper') }}</span>
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