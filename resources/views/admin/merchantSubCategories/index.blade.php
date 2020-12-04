@extends('layouts.admin')
@section('content')
@can('merchant_sub_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.merchant-sub-categories.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.merchantSubCategory.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.merchantSubCategory.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-MerchantSubCategory">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.merchantSubCategory.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantSubCategory.fields.sub_category') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantSubCategory.fields.in_enable') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantSubCategory.fields.category') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantCategory.fields.is_enable') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantSubCategory.fields.image') }}
                    </th>
                    <th>
                        {{ trans('cruds.merchantSubCategory.fields.parent') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('merchant_sub_category_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.merchant-sub-categories.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.merchant-sub-categories.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'sub_category', name: 'sub_category' },
{ data: 'in_enable', name: 'in_enable' },
{ data: 'category_name', name: 'category.name' },
{ data: 'category.is_enable', name: 'category.is_enable' },
{ data: 'image', name: 'image', sortable: false, searchable: false },
{ data: 'parent', name: 'parent' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-MerchantSubCategory').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection