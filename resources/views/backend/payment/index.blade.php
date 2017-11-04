@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.payments.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.payments.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.payments.all') }}</h3>

            <div class="box-tools pull-right">
                <div class="pull-right mb-10 hidden-sm hidden-xs">
                    {{ link_to_route('admin.payments.create', trans('menus.backend.payments.create'), [], ['class' => 'btn btn-success btn-sm']) }}
                </div><!--pull right-->
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="payments-table" class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>{{ trans('labels.backend.payments.table.id') }}</th>
                            <th>{{ trans('labels.backend.payments.table.student') }}</th>
                            <th>{{ trans('labels.backend.payments.table.amount') }}</th>
                            <th>{{ trans('labels.backend.payments.table.type') }}</th>
                            <th>{{ trans('labels.backend.payments.table.installment') }}</th>
                            <th>{{ trans('labels.backend.payments.table.month') }}</th>
                            <th>{{ trans('labels.backend.payments.table.paid_at') }}</th>
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
            $('#payments-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.payments.get") }}',
                    type: 'post',
                    data: {status: 1}
                },
                columns: [
                    {data: 'id', name: 'payments.id'},
                    {data: 'name', name: 'student.name'},
                    {data: 'amount', name: 'payments.amount'},
                    {data: 'type', name: 'payments.type'},
                    {data: 'installment', name: 'payments.installment'},
                    {data: 'month', name: 'payments.month'},
                    {data: 'created_at', name: 'payments.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500
            });
        });
    </script>
@stop
