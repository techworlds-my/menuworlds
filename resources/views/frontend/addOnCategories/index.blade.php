@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('add_on_category_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.add-on-categories.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.addOnCategory.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.addOnCategory.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AddOnCategory">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.addOnCategory.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addOnCategory.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addOnCategory.fields.is_enable') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.addOnCategory.fields.created_by') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($addOnCategories as $key => $addOnCategory)
                                    <tr data-entry-id="{{ $addOnCategory->id }}">
                                        <td>
                                            {{ $addOnCategory->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $addOnCategory->title ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $addOnCategory->is_enable ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $addOnCategory->is_enable ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $addOnCategory->created_by->company_name ?? '' }}
                                        </td>
                                        <td>
                                            @can('add_on_category_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.add-on-categories.show', $addOnCategory->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('add_on_category_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.add-on-categories.edit', $addOnCategory->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('add_on_category_delete')
                                                <form action="{{ route('frontend.add-on-categories.destroy', $addOnCategory->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('add_on_category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.add-on-categories.massDestroy') }}",
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
  let table = $('.datatable-AddOnCategory:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection