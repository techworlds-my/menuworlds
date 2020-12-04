@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('merchant_level_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.merchant-levels.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.merchantLevel.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.merchantLevel.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-MerchantLevel">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.merchantLevel.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantLevel.fields.level') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantLevel.fields.in_enable') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantLevel.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.merchantLevel.fields.module') }}
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
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($merchantLevels as $key => $merchantLevel)
                                    <tr data-entry-id="{{ $merchantLevel->id }}">
                                        <td>
                                            {{ $merchantLevel->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantLevel->level ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $merchantLevel->in_enable ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $merchantLevel->in_enable ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $merchantLevel->description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $merchantLevel->module ?? '' }}
                                        </td>
                                        <td>
                                            @can('merchant_level_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.merchant-levels.show', $merchantLevel->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('merchant_level_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.merchant-levels.edit', $merchantLevel->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('merchant_level_delete')
                                                <form action="{{ route('frontend.merchant-levels.destroy', $merchantLevel->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('merchant_level_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.merchant-levels.massDestroy') }}",
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
  let table = $('.datatable-MerchantLevel:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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