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
        @include('backend.student.includes.info')
    </div>
    <div class="col-sm-8 col-md-9">
        <div class="nav-tabs-custom">
            @include('backend.student.includes.partials.tabs', ['tab' => 'profile', 'student' => $student])

            <div class="tab-content">
                <div class="tab-pane active" id="profile">

                </div>
                <div class="tab-pane" id="sessions">
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
