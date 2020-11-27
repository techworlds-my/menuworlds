@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.addOnManagement.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.add-on-managements.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.addOnManagement.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addOnManagement.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="price">{{ trans('cruds.addOnManagement.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                            @if($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addOnManagement.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_enable" value="0">
                                <input type="checkbox" name="is_enable" id="is_enable" value="1" {{ old('is_enable', 0) == 1 || old('is_enable') === null ? 'checked' : '' }}>
                                <label for="is_enable">{{ trans('cruds.addOnManagement.fields.is_enable') }}</label>
                            </div>
                            @if($errors->has('is_enable'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_enable') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addOnManagement.fields.is_enable_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="item">{{ trans('cruds.addOnManagement.fields.item') }}</label>
                            <input class="form-control" type="text" name="item" id="item" value="{{ old('item', '') }}" required>
                            @if($errors->has('item'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('item') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addOnManagement.fields.item_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="category_id">{{ trans('cruds.addOnManagement.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id" required>
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.addOnManagement.fields.category_helper') }}</span>
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