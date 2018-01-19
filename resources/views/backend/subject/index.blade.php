@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.subjects.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/datatables.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.subjects.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.subjects.all') }}</h3>

            <div class="box-tools pull-right">
                <div class="pull-right mb-10">
                    {{ link_to_route('admin.subjects.create', trans('menus.backend.subjects.create'), [], ['class' => 'btn btn-success btn-sm']) }}
                </div><!--pull right-->
                <div class="clearfix"></div>
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            {!! $dataTable->table() !!}
        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/datatables.js") }}
    {{ Html::script("/vendor/datatables/buttons.server-side.js") }}

    {!! $dataTable->scripts() !!}

    <script>
        $(function() {
            $('#subjects-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.subjects.get") }}',
                    type: 'post',
                    data: {status: 1}
                },
                columns: [
                    {data: 'id', name: 'subjects.id'},
                    {data: 'name', name: 'subjects.name'},
                    {data: 'description', name: 'subjects.description', render: $.fn.dataTable.render.text()},
                    {data: 'status', name: 'subjects.status'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop
