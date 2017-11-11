@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.sessions.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.sessions.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.sessions.all') }}</h3>

            <div class="box-tools pull-right">
                <div class="pull-right mb-10">
                    {{ link_to_route('admin.subjects.create', trans('menus.backend.subjects.create'), [], ['class' => 'btn btn-success btn-sm']) }}
                </div><!--pull right-->
                <div class="clearfix"></div>
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="sessions-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.sessions.table.name') }}</th>
                            <th>{{ trans('labels.backend.sessions.table.start_time') }}</th>
                            <th>{{ trans('labels.backend.sessions.table.end_time') }}</th>
                            <th>{{ trans('labels.backend.sessions.table.teacher') }}</th>
                            <th>{{ trans('labels.backend.sessions.table.location') }}</th>
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
            $('#sessions-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.sessions.get") }}',
                    type: 'post',
                    data: {status: 1}
                },
                columns: [
                    {data: 'index_number', name: 'sessions.name'},
                    {data: 'name', name: 'sessions.start_time'},
                    {data: 'phone', name: 'sessions.end_time'},
                    {data: 'status', name: 'sessions.teacher'},
                    {data: 'created_at', name: 'sessions.location'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                select: true,
                searchDelay: 500
            });
        });
    </script>
@stop
