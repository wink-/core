@extends('layouts.admin')
@section('content')
@can('part_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.parts.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.part.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.part.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Part">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.part.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.part.fields.number') }}
                    </th>
                    <th>
                        {{ trans('cruds.part.fields.description') }}
                    </th>
                    <th>
                        {{ trans('cruds.part.fields.customer_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.part.fields.customer_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.part.fields.process_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.part.fields.price') }}
                    </th>
                    <th>
                        {{ trans('cruds.part.fields.minimum_lot_charge') }}
                    </th>
                    <th>
                        {{ trans('cruds.part.fields.quote') }}
                    </th>
                    <th>
                        {{ trans('cruds.part.fields.specification') }}
                    </th>
                    <th>
                        {{ trans('cruds.part.fields.procedure_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.part.fields.operator_note') }}
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
  
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.parts.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'number', name: 'number' },
{ data: 'description', name: 'description' },
{ data: 'customer_code', name: 'customer_code' },
{ data: 'customer_name', name: 'customer_name' },
{ data: 'process_code', name: 'process_code' },
{ data: 'price', name: 'price' },
{ data: 'minimum_lot_charge', name: 'minimum_lot_charge' },
{ data: 'quote', name: 'quote' },
{ data: 'specification', name: 'specification' },
{ data: 'procedure_code', name: 'procedure_code' },
{ data: 'operator_note', name: 'operator_note' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  $('.datatable-Part').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
});

</script>
@endsection