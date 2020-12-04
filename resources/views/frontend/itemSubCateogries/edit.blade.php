@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.itemSubCateogry.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.item-sub-cateogries.update", [$itemSubCateogry->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.itemSubCateogry.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $itemSubCateogry->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemSubCateogry.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="item_category_id">{{ trans('cruds.itemSubCateogry.fields.item_category') }}</label>
                            <select class="form-control select2" name="item_category_id" id="item_category_id" required>
                                @foreach($item_categories as $id => $item_category)
                                    <option value="{{ $id }}" {{ (old('item_category_id') ? old('item_category_id') : $itemSubCateogry->item_category->id ?? '') == $id ? 'selected' : '' }}>{{ $item_category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('item_category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('item_category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemSubCateogry.fields.item_category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="is_enable">{{ trans('cruds.itemSubCateogry.fields.is_enable') }}</label>
                            <input class="form-control" type="text" name="is_enable" id="is_enable" value="{{ old('is_enable', $itemSubCateogry->is_enable) }}">
                            @if($errors->has('is_enable'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_enable') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemSubCateogry.fields.is_enable_helper') }}</span>
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