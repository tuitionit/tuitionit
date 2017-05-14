@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.students.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.students.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.students.all') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.includes.partials.students-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="students-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.students.table.id') }}</th>
                            <th>{{ trans('labels.backend.students.table.name') }}</th>
                            <th>{{ trans('labels.backend.students.table.phone') }}</th>
                            <th>{{ trans('labels.backend.students.table.status') }}</th>
                            <th>{{ trans('labels.backend.students.table.created') }}</th>
                            <th>{{ trans('labels.backend.students.table.last_updated') }}</th>
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
            $('#students-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.students.get") }}',
                    type: 'post',
                    data: {status: 1}
                },
                columns: [
                    {data: 'id', name: 'students.id'},
                    {data: 'name', name: 'students.name', render: $.fn.dataTable.render.text()},
                    {data: 'phone', name: 'students.phone', render: $.fn.dataTable.render.text()},
                    {data: 'status', name: 'students.status', render: $.fn.dataTable.render.text()},
                    {data: 'created_at', name: 'students.created_at'},
                    {data: 'updated_at', name: 'students.updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop