@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.merchantManagement.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.merchant-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.id') }}
                        </th>
                        <td>
                            {{ $merchantManagement->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.company_name') }}
                        </th>
                        <td>
                            {{ $merchantManagement->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.ssm') }}
                        </th>
                        <td>
                            {{ $merchantManagement->ssm }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.address') }}
                        </th>
                        <td>
                            {{ $merchantManagement->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.postcode') }}
                        </th>
                        <td>
                            {{ $merchantManagement->postcode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.in_charge_person') }}
                        </th>
                        <td>
                            {{ $merchantManagement->in_charge_person }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.contact') }}
                        </th>
                        <td>
                            {{ $merchantManagement->contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.email') }}
                        </th>
                        <td>
                            {{ $merchantManagement->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.position') }}
                        </th>
                        <td>
                            {{ $merchantManagement->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.website') }}
                        </th>
                        <td>
                            {{ $merchantManagement->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.facebook') }}
                        </th>
                        <td>
                            {{ $merchantManagement->facebook }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.instagram') }}
                        </th>
                        <td>
                            {{ $merchantManagement->instagram }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.merchant') }}
                        </th>
                        <td>
                            {{ $merchantManagement->merchant }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.sub_category') }}
                        </th>
                        <td>
                            {{ $merchantManagement->sub_category->sub_category ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.approved_by') }}
                        </th>
                        <td>
                            {{ $merchantManagement->approved_by }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\MerchantManagement::STATUS_SELECT[$merchantManagement->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.profile_photo') }}
                        </th>
                        <td>
                            @if($merchantManagement->profile_photo)
                                <a href="{{ $merchantManagement->profile_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $merchantManagement->profile_photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.description') }}
                        </th>
                        <td>
                            {{ $merchantManagement->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.merchane_level') }}
                        </th>
                        <td>
                            {{ $merchantManagement->merchane_level->level ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.merchantManagement.fields.area') }}
                        </th>
                        <td>
                            {{ $merchantManagement->area->area ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.merchant-managements.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection