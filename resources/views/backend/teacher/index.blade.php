@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.teachers.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.teachers.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.teachers.all') }}</h3>

            <div class="box-tools pull-right">
                {{ link_to_route('admin.teachers.create', trans('menus.backend.teachers.create'), [], ['class' => 'btn btn-success btn-sm']) }}
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="teachers-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.teachers.table.id') }}</th>
                            <th>{{ trans('labels.backend.teachers.table.name') }}</th>
                            <th>{{ trans('labels.backend.teachers.table.short_name') }}</th>
                            <th>{{ trans('labels.backend.teachers.table.level') }}</th>
                            <th>{{ trans('labels.backend.teachers.table.status') }}</th>
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
            $('#teachers-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.teachers.get") }}',
                    type: 'post',
                    data: {status: 1}
                },
                columns: [
                    {data: 'id', name: 'teachers.id'},
                    {data: 'name', name: 'teachers.name', render: $.fn.dataTable.render.text()},
                    {data: 'short_name', name: 'teachers.short_name', render: $.fn.dataTable.render.text()},
                    {data: 'level', name: 'teachers.level', render: $.fn.dataTable.render.text()},
                    {data: 'status', name: 'teachers.status', render: $.fn.dataTable.render.text()},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop
