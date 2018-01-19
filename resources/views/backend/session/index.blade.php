@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.sessions.management'))

@section('after-styles')
    {{ Html::style("js/plugins/fullcalendar/fullcalendar.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.sessions.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success box-calendar">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.sessions.all') }}</h3>

            <div class="box-tools pull-right">
                <div class="pull-right mb-10">
                    {{ link_to_route('admin.sessions.create', trans('menus.backend.sessions.create'), [], ['class' => 'btn btn-success btn-sm']) }}
                </div><!--pull right-->
                <div class="clearfix"></div>
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div id="sessions-calendar">

            </div><!-- fullcalendar -->
        </div><!-- /.box-body -->
    </div><!--box-->
@stop

@section('after-scripts')
{{ Html::script("js/plugins/moment/moment.min.js") }}
{{ Html::script("js/plugins/fullcalendar/fullcalendar.min.js") }}

<script>
    $(function() {
        $('#sessions-calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            defaultView: 'agendaWeek',
            editable: true,
            events: '{{ route("admin.sessions.fetch") }}'
        });
    });
</script>
@stop
