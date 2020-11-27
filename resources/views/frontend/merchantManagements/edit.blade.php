@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.merchantManagement.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.merchant-managements.update", [$merchantManagement->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="company_name">{{ trans('cruds.merchantManagement.fields.company_name') }}</label>
                            <input class="form-control" type="text" name="company_name" id="company_name" value="{{ old('company_name', $merchantManagement->company_name) }}" required>
                            @if($errors->has('company_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('company_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.company_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ssm">{{ trans('cruds.merchantManagement.fields.ssm') }}</label>
                            <input class="form-control" type="text" name="ssm" id="ssm" value="{{ old('ssm', $merchantManagement->ssm) }}">
                            @if($errors->has('ssm'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ssm') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.ssm_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="address">{{ trans('cruds.merchantManagement.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $merchantManagement->address) }}" required>
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="postcode">{{ trans('cruds.merchantManagement.fields.postcode') }}</label>
                            <input class="form-control" type="text" name="postcode" id="postcode" value="{{ old('postcode', $merchantManagement->postcode) }}">
                            @if($errors->has('postcode'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('postcode') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.postcode_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="in_charge_person">{{ trans('cruds.merchantManagement.fields.in_charge_person') }}</label>
                            <input class="form-control" type="text" name="in_charge_person" id="in_charge_person" value="{{ old('in_charge_person', $merchantManagement->in_charge_person) }}" required>
                            @if($errors->has('in_charge_person'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('in_charge_person') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.in_charge_person_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="contact">{{ trans('cruds.merchantManagement.fields.contact') }}</label>
                            <input class="form-control" type="text" name="contact" id="contact" value="{{ old('contact', $merchantManagement->contact) }}" required>
                            @if($errors->has('contact'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('contact') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.contact_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.merchantManagement.fields.email') }}</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ old('email', $merchantManagement->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="position">{{ trans('cruds.merchantManagement.fields.position') }}</label>
                            <input class="form-control" type="text" name="position" id="position" value="{{ old('position', $merchantManagement->position) }}">
                            @if($errors->has('position'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('position') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.position_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="website">{{ trans('cruds.merchantManagement.fields.website') }}</label>
                            <input class="form-control" type="text" name="website" id="website" value="{{ old('website', $merchantManagement->website) }}">
                            @if($errors->has('website'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('website') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.website_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="facebook">{{ trans('cruds.merchantManagement.fields.facebook') }}</label>
                            <input class="form-control" type="text" name="facebook" id="facebook" value="{{ old('facebook', $merchantManagement->facebook) }}">
                            @if($errors->has('facebook'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('facebook') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.facebook_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="instagram">{{ trans('cruds.merchantManagement.fields.instagram') }}</label>
                            <input class="form-control" type="text" name="instagram" id="instagram" value="{{ old('instagram', $merchantManagement->instagram) }}">
                            @if($errors->has('instagram'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('instagram') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.instagram_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="merchant">{{ trans('cruds.merchantManagement.fields.merchant') }}</label>
                            <input class="form-control" type="text" name="merchant" id="merchant" value="{{ old('merchant', $merchantManagement->merchant) }}">
                            @if($errors->has('merchant'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('merchant') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.merchant_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="sub_category_id">{{ trans('cruds.merchantManagement.fields.sub_category') }}</label>
                            <select class="form-control select2" name="sub_category_id" id="sub_category_id" required>
                                @foreach($sub_categories as $id => $sub_category)
                                    <option value="{{ $id }}" {{ (old('sub_category_id') ? old('sub_category_id') : $merchantManagement->sub_category->id ?? '') == $id ? 'selected' : '' }}>{{ $sub_category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sub_category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('sub_category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.sub_category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="approved_by">{{ trans('cruds.merchantManagement.fields.approved_by') }}</label>
                            <input class="form-control" type="text" name="approved_by" id="approved_by" value="{{ old('approved_by', $merchantManagement->approved_by) }}">
                            @if($errors->has('approved_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('approved_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.approved_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.merchantManagement.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\MerchantManagement::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $merchantManagement->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="profile_photo">{{ trans('cruds.merchantManagement.fields.profile_photo') }}</label>
                            <div class="needsclick dropzone" id="profile_photo-dropzone">
                            </div>
                            @if($errors->has('profile_photo'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('profile_photo') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.profile_photo_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="description">{{ trans('cruds.merchantManagement.fields.description') }}</label>
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', $merchantManagement->description) }}" required>
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="merchane_level_id">{{ trans('cruds.merchantManagement.fields.merchane_level') }}</label>
                            <select class="form-control select2" name="merchane_level_id" id="merchane_level_id" required>
                                @foreach($merchane_levels as $id => $merchane_level)
                                    <option value="{{ $id }}" {{ (old('merchane_level_id') ? old('merchane_level_id') : $merchantManagement->merchane_level->id ?? '') == $id ? 'selected' : '' }}>{{ $merchane_level }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('merchane_level'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('merchane_level') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.merchane_level_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="area_id">{{ trans('cruds.merchantManagement.fields.area') }}</label>
                            <select class="form-control select2" name="area_id" id="area_id" required>
                                @foreach($areas as $id => $area)
                                    <option value="{{ $id }}" {{ (old('area_id') ? old('area_id') : $merchantManagement->area->id ?? '') == $id ? 'selected' : '' }}>{{ $area }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('area'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('area') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.merchantManagement.fields.area_helper') }}</span>
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
    Dropzone.options.profilePhotoDropzone = {
    url: '{{ route('admin.merchant-managements.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
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
      $('form').find('input[name="profile_photo"]').remove()
      $('form').append('<input type="hidden" name="profile_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="profile_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($merchantManagement) && $merchantManagement->profile_photo)
      var file = {!! json_encode($merchantManagement->profile_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="profile_photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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