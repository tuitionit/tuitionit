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
                <div class="tab-pane active" id="timeline">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            @if(isset($student->nextSession))
                            <div class="box box-solid box-warning">
                                <div class="box-header with-border">
                                    <i class="fa fa-clock-o"></i>
                                    <h3 class="box-title">{{ trans('labels.backend.student.next_session') }}</h3>
                                </div>
                                <div class="box-body">
                                    <h4>{{ $student->nextSession->name }}</h4>
                                    <div class="">
                                        <strong>{{ trans('strings.backend.sessions.time_from_to', ['start' => $student->nextSession->start_time->format('h:i A'), 'end' => $student->nextSession->end_time->format('h:i A')]) }}</strong> | {{ $student->nextSession->start_time->format('d M Y') }}
                                    </div>
                                </div>
                                <div class="box-footer no-bg">
                                    <a href="#" class="btn btn-sm">View all sessions...</a>
                                </div>
                            </div>
                            @else
                            <div class="box box-solid box-default">
                                <div class="box-header with-border">
                                    <i class="fa fa-clock-o"></i>
                                    <h3 class="box-title">{{ trans('labels.backend.student.next_session') }}</h3>
                                </div>
                                <div class="box-body">
                                    No Sessions
                                </div>
                                <div class="box-footer">

                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="box box-solid box-danger">
                                <div class="box-header with-border">
                                    <i class="fa fa-usd"></i>
                                    <h3 class="box-title">{{ trans('labels.backend.student.next_payment') }}</h3>
                                </div>
                                <div class="box-body">
                                    <h4>1200 LKR</h4>
                                    <div class="">
                                        <strong>Due on</strong> 30 Feb 2018
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <a href="#" class="btn btn-sm">View all payments...</a>
                                </div>
                            </div>
                        </div>
                    </div>

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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <div class="box-header">
                                    <h3 class="box-title">{{ trans('labels.backend.student.completed_payments') }}</h3>
                                </div>
                                <div class="box-body">
                                    @if(count($student->payments))
                                    <ul class="list-group list-group-unbordered">
                                        @foreach($student->payments as $payment)
                                        <li class="list-group-item">
                                            {{ link_to_route('admin.payments.show', $payment->amount, ['payment' => $payment->id]) }}
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="">
                                <div class="box-header">
                                    <h3 class="box-title">{{ trans('labels.backend.student.pending_payments') }}</h3>
                                </div>
                                <div class="box-body">
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <a href="#"><strong>Rs. 400 due on 12 Jan 2018</strong></a>
                                            <div class="pull-right">
                                                <a href="#" class="btn btn-sm btn-success"><i class="fa fa-check"></i> Paid</a>
                                                <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Remove</a>
                                            </div>
                                            <div class="small text-muted">
                                                Combined mathematics - AL 2018
                                            </div>

                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">400</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">400</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">400</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
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
