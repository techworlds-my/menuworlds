@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.itemManagement.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.item-managements.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.itemManagement.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemManagement.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="price">{{ trans('cruds.itemManagement.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                            @if($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemManagement.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="image">{{ trans('cruds.itemManagement.fields.image') }}</label>
                            <div class="needsclick dropzone" id="image-dropzone">
                            </div>
                            @if($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemManagement.fields.image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sales_price">{{ trans('cruds.itemManagement.fields.sales_price') }}</label>
                            <input class="form-control" type="text" name="sales_price" id="sales_price" value="{{ old('sales_price', '') }}">
                            @if($errors->has('sales_price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sales_price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemManagement.fields.sales_price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_recommended" value="0">
                                <input type="checkbox" name="is_recommended" id="is_recommended" value="1" {{ old('is_recommended', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_recommended">{{ trans('cruds.itemManagement.fields.is_recommended') }}</label>
                            </div>
                            @if($errors->has('is_recommended'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_recommended') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemManagement.fields.is_recommended_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_popular" value="0">
                                <input type="checkbox" name="is_popular" id="is_popular" value="1" {{ old('is_popular', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_popular">{{ trans('cruds.itemManagement.fields.is_popular') }}</label>
                            </div>
                            @if($errors->has('is_popular'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_popular') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemManagement.fields.is_popular_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_new" value="0">
                                <input type="checkbox" name="is_new" id="is_new" value="1" {{ old('is_new', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_new">{{ trans('cruds.itemManagement.fields.is_new') }}</label>
                            </div>
                            @if($errors->has('is_new'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_new') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemManagement.fields.is_new_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="rate">{{ trans('cruds.itemManagement.fields.rate') }}</label>
                            <input class="form-control" type="number" name="rate" id="rate" value="{{ old('rate', '') }}" step="1">
                            @if($errors->has('rate'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('rate') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemManagement.fields.rate_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_active">{{ trans('cruds.itemManagement.fields.is_active') }}</label>
                            </div>
                            @if($errors->has('is_active'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_active') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemManagement.fields.is_active_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_veg" value="0">
                                <input type="checkbox" name="is_veg" id="is_veg" value="1" {{ old('is_veg', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_veg">{{ trans('cruds.itemManagement.fields.is_veg') }}</label>
                            </div>
                            @if($errors->has('is_veg'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_veg') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemManagement.fields.is_veg_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_halal" value="0">
                                <input type="checkbox" name="is_halal" id="is_halal" value="1" {{ old('is_halal', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_halal">{{ trans('cruds.itemManagement.fields.is_halal') }}</label>
                            </div>
                            @if($errors->has('is_halal'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_halal') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemManagement.fields.is_halal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="sub_cateogry_id">{{ trans('cruds.itemManagement.fields.sub_cateogry') }}</label>
                            <select class="form-control select2" name="sub_cateogry_id" id="sub_cateogry_id">
                                @foreach($sub_cateogries as $id => $sub_cateogry)
                                    <option value="{{ $id }}" {{ old('sub_cateogry_id') == $id ? 'selected' : '' }}>{{ $sub_cateogry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sub_cateogry'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sub_cateogry') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemManagement.fields.sub_cateogry_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="categpry_id">{{ trans('cruds.itemManagement.fields.categpry') }}</label>
                            <select class="form-control select2" name="categpry_id" id="categpry_id">
                                @foreach($categpries as $id => $categpry)
                                    <option value="{{ $id }}" {{ old('categpry_id') == $id ? 'selected' : '' }}>{{ $categpry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('categpry'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('categpry') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.itemManagement.fields.categpry_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedImageMap = {}
Dropzone.options.imageDropzone = {
    url: '{{ route('admin.item-managements.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
      uploadedImageMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedImageMap[file.name]
      }
      $('form').find('input[name="image[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($itemManagement) && $itemManagement->image)
      var files = {!! json_encode($itemManagement->image) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="image[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection