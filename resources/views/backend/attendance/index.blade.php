@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.attendances.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/datatables.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.attendances.management') }}
    </h1>
@endsection

@section('content')
    {!! $dataTable->table() !!}
@stop

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/datatables.js") }}
    {{ Html::script("/vendor/datatables/buttons.server-side.js") }}

    <script type="text/javascript">
        $.fn.DataTable.ext.buttons.mark = {
            className: 'buttons-mark',
            text: function (dt) {
                return '<i class="fa fa-check-circle-o"></i> ' + dt.i18n('buttons.mark', 'Mark Attendance');
            },

            action: function (e, dt, button, config) {
                window.location = '{{ route('admin.attendances.mark') }}';
            }
        };
    </script>
    {!! $dataTable->scripts() !!}
@stop
