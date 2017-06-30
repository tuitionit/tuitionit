@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.batches.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.batches.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.batches.all') }}</h3>

            <div class="box-tools pull-right">
                <div class="pull-right mb-10 hidden-sm hidden-xs">
                    {{ link_to_route('admin.batches.create', trans('menus.backend.batches.create'), [], ['class' => 'btn btn-success btn-sm']) }}
                </div><!--pull right-->
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="batches-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.batches.table.id') }}</th>
                            <th>{{ trans('labels.backend.batches.table.name') }}</th>
                            <th>{{ trans('labels.backend.batches.table.description') }}</th>
                            <th>{{ trans('labels.backend.batches.table.status') }}</th>
                            <th>{{ trans('labels.backend.batches.table.created') }}</th>
                            <th>{{ trans('labels.backend.batches.table.last_updated') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/jquery.dataTables.min.js") }}
    {{ Html::script("js/backend/plugin/datatables/dataTables.bootstrap.min.js") }}

    <script>
        $(function() {
            $('#batches-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.batches.get") }}',
                    type: 'post',
                    data: {status: 1}
                },
                columns: [
                    {data: 'id', name: 'batches.id'},
                    {data: 'name', name: 'batches.name', render: $.fn.dataTable.render.text()},
                    {data: 'description', name: 'batches.description', render: $.fn.dataTable.render.text()},
                    {data: 'status', name: 'batches.status'},
                    {data: 'created_at', name: 'batches.created_at'},
                    {data: 'updated_at', name: 'batches.updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop
