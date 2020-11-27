@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('merchant_management_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.merchant-managements.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.merchantManagement.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.merchantManagement.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-MerchantManagement">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.company_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.ssm') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.postcode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.in_charge_person') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.contact') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.position') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.website') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.facebook') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.instagram') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.merchant') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.sub_category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.approved_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.profile_photo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.merchane_level') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantManagement.fields.area') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.area.fields.postcode') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($merchant_sub_categories as $key => $item)
                                                <option value="{{ $item->sub_category }}">{{ $item->sub_category }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\MerchantManagement::STATUS_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($merchant_levels as $key => $item)
                                                <option value="{{ $item->level }}">{{ $item->level }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($areas as $key => $item)
                                                <option value="{{ $item->area }}">{{ $item->area }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($merchantManagements as $key => $merchantManagement)
                                    <tr data-entry-id="{{ $merchantManagement->id }}">
                                        <td>
                                            {{ $merchantManagement->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->company_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->ssm ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->postcode ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->in_charge_person ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->contact ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->position ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->website ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->facebook ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->instagram ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->merchant ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->sub_category->sub_category ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->approved_by ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\MerchantManagement::STATUS_SELECT[$merchantManagement->status] ?? '' }}
                                        </td>
                                        <td>
                                            @if($merchantManagement->profile_photo)
                                                <a href="{{ $merchantManagement->profile_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $merchantManagement->profile_photo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $merchantManagement->description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->merchane_level->level ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->area->area ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantManagement->area->postcode ?? '' }}
                                        </td>
                                        <td>
                                            @can('merchant_management_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.merchant-managements.show', $merchantManagement->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('merchant_management_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.merchant-managements.edit', $merchantManagement->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('merchant_management_delete')
                                                <form action="{{ route('frontend.merchant-managements.destroy', $merchantManagement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('merchant_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.merchant-managements.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-MerchantManagement:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });
})

</script>
@endsection