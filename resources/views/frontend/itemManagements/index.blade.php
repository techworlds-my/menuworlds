@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('item_management_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.item-managements.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.itemManagement.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.itemManagement.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-ItemManagement">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.image') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.sales_price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.is_recommended') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.is_popular') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.is_new') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.rate') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.is_active') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.is_veg') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.is_halal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.sub_category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.itemManagement.fields.merchant') }}
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
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($item_sub_categories as $key => $item)
                                                <option value="{{ $item->title }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($item_categories as $key => $item)
                                                <option value="{{ $item->title }}">{{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($merchant_managements as $key => $item)
                                                <option value="{{ $item->company_name }}">{{ $item->company_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($itemManagements as $key => $itemManagement)
                                    <tr data-entry-id="{{ $itemManagement->id }}">
                                        <td>
                                            {{ $itemManagement->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $itemManagement->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $itemManagement->price ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($itemManagement->image as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $itemManagement->sales_price ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $itemManagement->is_recommended ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $itemManagement->is_recommended ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $itemManagement->is_popular ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $itemManagement->is_popular ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $itemManagement->is_new ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $itemManagement->is_new ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $itemManagement->rate ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $itemManagement->is_active ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $itemManagement->is_active ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $itemManagement->is_veg ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $itemManagement->is_veg ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $itemManagement->is_halal ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $itemManagement->is_halal ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $itemManagement->sub_category->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $itemManagement->category->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $itemManagement->merchant->company_name ?? '' }}
                                        </td>
                                        <td>
                                            @can('item_management_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.item-managements.show', $itemManagement->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('item_management_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.item-managements.edit', $itemManagement->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('item_management_delete')
                                                <form action="{{ route('frontend.item-managements.destroy', $itemManagement->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('item_management_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.item-managements.massDestroy') }}",
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
  let table = $('.datatable-ItemManagement:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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