@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.locations.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.locations.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.locations.all') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.includes.partials.locations-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="locations-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.locations.table.id') }}</th>
                            <th>{{ trans('labels.backend.locations.table.index_number') }}</th>
                            <th>{{ trans('labels.backend.locations.table.name') }}</th>
                            <th>{{ trans('labels.backend.locations.table.phone') }}</th>
                            <th>{{ trans('labels.backend.locations.table.status') }}</th>
                            <th>{{ trans('labels.backend.locations.table.created') }}</th>
                            <th>{{ trans('labels.backend.locations.table.last_updated') }}</th>
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
            $('#locations-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.locations.get") }}',
                    type: 'post',
                    data: {status: 1}
                },
                columns: [
                    {data: 'id', name: 'locations.id'},
                    {data: 'index_number', name: 'locations.index_number'},
                    {data: 'name', name: 'locations.name', render: $.fn.dataTable.render.text()},
                    {data: 'phone', name: 'locations.phone', render: $.fn.dataTable.render.text()},
                    {data: 'status', name: 'locations.status', render: $.fn.dataTable.render.text()},
                    {data: 'created_at', name: 'locations.created_at'},
                    {data: 'updated_at', name: 'locations.updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop
