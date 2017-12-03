@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.attendances.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.attendances.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.attendances.all') }}</h3>

            <div class="box-tools pull-right">
                <div class="pull-right mb-10">
                    {{ link_to_route('admin.attendances.mark', trans('menus.backend.attendances.mark'), [], ['class' => 'btn btn-success btn-sm']) }}
                </div><!--pull right-->
                <div class="clearfix"></div>
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="attendances-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.attendances.table.id') }}</th>
                            <th>{{ trans('labels.backend.attendances.table.student') }}</th>
                            <th>{{ trans('labels.backend.attendances.table.session') }}</th>
                            <th>{{ trans('labels.backend.attendances.table.in_time') }}</th>
                            <th>{{ trans('labels.backend.attendances.table.out_time') }}</th>
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
            $('#attendances-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.attendances.get") }}',
                    type: 'post',
                    data: {status: 1}
                },
                columns: [
                    {data: 'id', name: 'attendances.id'},
                    {data: 'student', name: 'attendances.student'},
                    {data: 'session', name: 'attendances.session'},
                    {data: 'in_time', name: 'attendances.in_time'},
                    {data: 'out_time', name: 'attendances.out_time'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop
