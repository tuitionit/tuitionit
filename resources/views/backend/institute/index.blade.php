@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.institutes.management'))

@section('after-styles-end')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.institutes.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.institutes.all') }}</h3>

            <div class="box-tools pull-right">
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="institutes-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.institutes.table.id') }}</th>
                            <th>{{ trans('labels.backend.institutes.table.name') }}</th>
                            <th>{{ trans('labels.backend.institutes.table.code') }}</th>
                            <th>{{ trans('labels.backend.institutes.table.city') }}</th>
                            <th>{{ trans('labels.backend.institutes.table.created') }}</th>
                            <th>{{ trans('labels.backend.institutes.table.last_updated') }}</th>
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
            $('#institutes-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.institutes.get") }}',
                    type: 'post',
                    data: {status: 1}
                },
                columns: [
                    {data: 'id', name: 'institutes.id'},
                    {data: 'name', name: 'institutes.name', render: $.fn.dataTable.render.text()},
                    {data: 'code', name: 'institutes.code', render: $.fn.dataTable.render.text()},
                    {data: 'city', name: 'institutes.city', render: $.fn.dataTable.render.text()},
                    {data: 'created_at', name: 'institutes.created_at'},
                    {data: 'updated_at', name: 'institutes.updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop
