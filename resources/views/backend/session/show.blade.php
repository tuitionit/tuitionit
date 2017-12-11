@extends ('backend.layouts.app')

@section ('title', $student->name)

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
    {{ Html::style("js/plugins/fullcalendar/fullcalendar.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ $student->name }}
        <small>{{ $student->name }}</small>
    </h1>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-4 col-md-3">
        <div class="box box-primary">
            <div class="box-body">
                <img src="{{ URL::to('/') }}/img/student.png" class="profile-user-img img-responsive img-circle" />
                <h3 class="profile-username text-center">{{ $student->name }}</h3>
            </div><!-- /.box-body -->
        </div><!--box-->
    </div>
    <div class="col-sm-8 col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#sessions" data-toggle="tab"><i class="fa fa-clock-o"></i> {{ trans('labels.backend.student.sessions')}}</a>
                </li>
                <li class="">
                    <a href="#reports" data-toggle="tab"><i class="fa fa-clone"></i> {{ trans('labels.backend.student.reports')}}</a>
                </li>
                <li class="">
                    <a href="#batches" data-toggle="tab"><i class="fa fa-users"></i> {{ trans('labels.backend.student.batches')}}</a>
                </li>
                <li class="">
                    <a href="#payments" data-toggle="tab"><i class="fa fa-money"></i> {{ trans('labels.backend.student.payments')}}</a>
                </li>
                <li class="">
                    <a href="#settings" data-toggle="tab"><i class="fa fa-gears"></i> {{ trans('labels.backend.student.settings')}}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="sessions">
                    <div id="sessions-calendar">

                    </div>
                </div>
                <div class="tab-pane" id="reports">

                </div>
                <div class="tab-pane" id="batches">

                </div>
                <div class="tab-pane" id="payments">

                </div>
                <div class="tab-pane" id="settings">

                </div>
            </div>
        </div>
    </div>
</div>
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
    				right: 'month,agendaWeek,agendaDay'
    			},
    			defaultView: 'agendaWeek',
    			editable: true,
            });
        });
    </script>
@stop
