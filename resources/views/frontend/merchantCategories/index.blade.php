@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('merchant_category_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.merchant-categories.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.merchantCategory.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.merchantCategory.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-MerchantCategory">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.merchantCategory.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantCategory.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantCategory.fields.is_enable') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantCategory.fields.image') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($merchantCategories as $key => $merchantCategory)
                                    <tr data-entry-id="{{ $merchantCategory->id }}">
                                        <td>
                                            {{ $merchantCategory->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantCategory->name ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $merchantCategory->is_enable ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $merchantCategory->is_enable ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @if($merchantCategory->image)
                                                <a href="{{ $merchantCategory->image->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $merchantCategory->image->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('merchant_category_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.merchant-categories.show', $merchantCategory->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('merchant_category_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.merchant-categories.edit', $merchantCategory->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('merchant_category_delete')
                                                <form action="{{ route('frontend.merchant-categories.destroy', $merchantCategory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('merchant_category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.merchant-categories.massDestroy') }}",
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
  let table = $('.datatable-MerchantCategory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection