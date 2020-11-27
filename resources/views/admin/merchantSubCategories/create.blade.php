@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.merchantSubCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.merchant-sub-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="sub_category">{{ trans('cruds.merchantSubCategory.fields.sub_category') }}</label>
                <input class="form-control {{ $errors->has('sub_category') ? 'is-invalid' : '' }}" type="text" name="sub_category" id="sub_category" value="{{ old('sub_category', '') }}" required>
                @if($errors->has('sub_category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantSubCategory.fields.sub_category_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('in_enable') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="in_enable" value="0">
                    <input class="form-check-input" type="checkbox" name="in_enable" id="in_enable" value="1" {{ old('in_enable', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="in_enable">{{ trans('cruds.merchantSubCategory.fields.in_enable') }}</label>
                </div>
                @if($errors->has('in_enable'))
                    <div class="invalid-feedback">
                        {{ $errors->first('in_enable') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantSubCategory.fields.in_enable_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.merchantSubCategory.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.merchantSubCategory.fields.category_helper') }}</span>
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