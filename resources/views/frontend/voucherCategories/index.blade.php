@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('voucher_category_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.voucher-categories.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.voucherCategory.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.voucherCategory.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-VoucherCategory">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.voucherCategory.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.voucherCategory.fields.category') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.voucherCategory.fields.is_enable') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($voucherCategories as $key => $voucherCategory)
                                    <tr data-entry-id="{{ $voucherCategory->id }}">
                                        <td>
                                            {{ $voucherCategory->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $voucherCategory->category ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $voucherCategory->is_enable ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $voucherCategory->is_enable ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @can('voucher_category_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.voucher-categories.show', $voucherCategory->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('voucher_category_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.voucher-categories.edit', $voucherCategory->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('voucher_category_delete')
                                                <form action="{{ route('frontend.voucher-categories.destroy', $voucherCategory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('voucher_category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.voucher-categories.massDestroy') }}",
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
  let table = $('.datatable-VoucherCategory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection