@extends('layouts.admin')
@section('content')
@can('item_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.item-categories.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.itemCategory.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.itemCategory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ItemCategory">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.itemCategory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.itemCategory.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.itemCategory.fields.is_enable') }}
                        </th>
                        <th>
                            {{ trans('cruds.itemCategory.fields.merchant') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itemCategories as $key => $itemCategory)
                        <tr data-entry-id="{{ $itemCategory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $itemCategory->id ?? '' }}
                            </td>
                            <td>
                                {{ $itemCategory->title ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $itemCategory->is_enable ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $itemCategory->is_enable ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $itemCategory->merchant->company_name ?? '' }}
                            </td>
                            <td>
                                @can('item_category_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.item-categories.show', $itemCategory->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('item_category_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.item-categories.edit', $itemCategory->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('item_category_delete')
                                    <form action="{{ route('admin.item-categories.destroy', $itemCategory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('item_category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.item-categories.massDestroy') }}",
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
  let table = $('.datatable-ItemCategory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection