@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.attendances.management') . ' | ' . trans('labels.backend.attendances.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.attendances.mark') }}
    </h1>
@endsection

@section('after-styles')
    {{ Html::style("css/backend/plugin/select2/select2.min.css") }}
    {{ Html::style("css/backend/plugin/select2/select2-bootstrap.min.css") }}

    <style media="screen">
        #total-attendance {
            font-size: 200%;
        }

        .messages {
            font-size: 1.2em;
        }

        .messages .alert {
            /*border-width: 1px 0;
            border-radius: 0;
            margin: 0 -30px;*/
        }

        .messages .fa {
            display: block;
            font-size: 2em;
        }

        #student {
            overflow: hidden;
            text-align: left;
        }

        #student .image {
            float: left;
            width: 80px;
        }

        #student .details {
            margin-left: 100px;
        }

        #preview {
            max-width: 100%;
        }
    </style>
@stop

@section('content')
    @if($session && $session->exists)
        {{ Form::open(['route' => ['admin.attendances.store', 'session' => $session->id], 'id' => 'attendance-form', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}
        <div class="box box-success with-border" id="attendance-box">
            <div class="row">
                <div class="col-md-6 col-lg-4 col-md-offset-3 col-lg-offset-4">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $session->name  }}</h3>
                        <div class="small text-muted">{{ $session->batch->name }}</div>
                        <div class="small text-muted"><strong>{{ trans('strings.backend.sessions.time_from_to', ['start' => $session->start_time->format('h:i A'), 'end' => $session->end_time->format('h:i A')]) }}</strong> | {{ $session->start_time->format('d M Y') }}</div>

                        <div class="box-tools pull-right">
                            <span id="total-attendance">{{ $session->attendance }}</span>
                        </div><!--box-tools pull-right-->
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <video id="preview" src="" autoplay poster="posterimage.jpg">

                                </video>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('id', 'has-error') }}" id="student-id-form-group">
                            <div class="col-xs-12">
                                {{ Form::text('id', null, ['id' => 'student-id', 'class' => 'form-control', 'placeholder' => trans('strings.backend.attendances.id'), 'autocomplete' => 'off']) }}
                                <div class="help-block text-center hidden" id="student-id-help">{{ trans('strings.backend.attendances.empty_student_id') }}</div>
                            </div><!--col-xs-12-->
                        </div><!--form control-->

                        <div class="form-group">
                            <div class="col-xs-6 col-xs-offset-3">
                                {{ Form::submit(trans('buttons.backend.attendance.mark'), ['id' => 'mark-attendance', 'class' => 'btn btn-success btn-block', 'disabled' => true]) }}
                            </div>
                        </div><!-- /.form-group -->

                        <div class="form-group messages">
                            <div class="col-xs-12 text-center">
                                <div id="saving" class="alert alert-default hidden">
                                    <i class="fa fa-spinner fa-spin"></i> {{ trans('strings.backend.attendances.saving') }}
                                </div>
                                <div id="failed" class="alert alert-danger hidden">
                                    <i class="fa fa-spinner fa-chain-broken"></i> {{ trans('strings.backend.attendances.failed') }}
                                </div>
                                <div id="message" class="hidden"></div>
                                <div id="student" class="hidden">
                                    <div class="image">
                                        <img src="{{ URL::to('/') }}/img/student.png" alt="student" class="profile-user-img img-responsive img-circle" />
                                    </div>
                                    <div class="details">
                                        <h5 id="student-name"></h5>
                                        <div id="student-index" class="small text-muted"></div>
                                        <div id="student-payment"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div><!-- /.box-body -->
                </div>
            </div>
        </div><!--box-->
        {{ Form::close() }}
    @else
    <div class="box box-success with-border">
        <div class="row">
            <div class="col-md-6 col-lg-4 col-md-offset-3 col-lg-offset-4">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">{{ trans('labels.backend.attendances.select_session') }}</h3>

                    <div class="box-tools pull-right">
                    </div><!--box-tools pull-right-->
                </div><!-- /.box-header -->

                <div class="box-body">
                    @if(count($sessions) == 0)
                        <div class="big-message">
                            <div class="icon">
                                <i class="fa fa-calendar-o"></i>
                            </div>
                            <div class="text">
                                {{ trans('strings.backend.attendances.no_sessions') }}
                            </div>
                         </div>
                        <div class="form-group">
                            <div class="col-xs-6 col-xs-offset-3">
                                <a href="{{ route('admin.sessions.create') }}" class="btn btn-success btn-block"><i class="fa fa-calendar-plus-o"></i> {{ trans('buttons.backend.session.create') }}</a>
                            </div>
                        </div>
                    @else
                        {{ Form::open(['route' => 'admin.attendances.mark', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'get']) }}

                        <p class="description text-center">{{ trans('strings.backend.attendances.select_session') }}</p>

                        <div class="form-group {{ $errors->first('session', 'has-error') }}" id="session-form-group">
                            <div class="col-xs-12">
                                {{ Form::select('session', [], null, ['id' => 'session', 'class' => 'form-control']) }}
                            </div><!--col-lg-10-->
                        </div><!--form-group-->

                        <div class="form-group">
                            <div class="col-xs-6 col-xs-offset-3">
                                {{ Form::submit(trans('buttons.backend.attendance.mark_attendance'), ['class' => 'btn btn-success btn-block']) }}
                            </div>
                        </div>

                        {{ Form::close() }}
                    @endif
                </div><!-- /.box-body -->
            </div>
        </div><!--box-->
    </div>
    @endif
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
    {{ Html::script("js/backend/plugin/select2/select2.full.min.js") }}
    {{ Html::script("js/plugins/instascan/instascan.min.js") }}

    <script>
        $(document).ready(function() {
            var beep = new Audio('{{ URL::to('/') }}/sounds/success.mp3');
            var buzz = new Audio('{{ URL::to('/') }}/sounds/error.mp3');

            $('#session').select2({
                data: {!! json_encode($sessions) !!},
                theme: 'bootstrap',
                placeholder: '{{ trans('validation.attributes.backend.attendance.session') }}',
                multiple: false,
                width: '100%',
                templateResult: function(data) {
                    return $('<div><strong>' + data.text + '</strong><br/><small><strong>' + data.time + '</strong> | ' + data.batch + '</small></div>');
                }
            });

            $(document).on('keydown', function(evt) {
                $('#student-id').focus();
            });

            $('#student-id').on('keyup change', function(evt) {
                var empty = $('#student-id').val() == '';
                $('#mark-attendance').prop('disabled', empty);
                $('#student-id-help').toggleClass('hidden', !empty);
                $('#student-id-form-group').toggleClass('has-error', empty);
            });

            $('#attendance-form').on('submit', function(evt) {
                evt.preventDefault();
                var id = $('#student-id').val();
                var box = $('#attendance-box');
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'post',
                    data: {id: id},
                    dataType: 'json',
                    beforeSend: function() {
                        box.attr('class', '').addClass('box');
                        if(id == '') {
                            $('#student-id-help').removeClass('hidden');
                            box.addClass('box-error');
                            return false;
                        } else {
                            box.addClass('box-default');
                            $('#saving, #message').toggleClass('hidden');
                            $('#mark-attendance, #student-id').prop('disabled', true);
                        }
                        $('#student-id-help, #failed, #student').addClass('hidden');
                    },
                    success: function(data, status) {
                        var icon = '';
                        box.attr('class', '').addClass('box');
                        if(data.type == 'success') {
                            beep.play();
                            $('#total-attendance').text(data.count);
                            icon = '<i class="fa fa-check-circle"></i>';
                            box.addClass('box-success');
                            $('#student-name').text(data.student.name);
                            $('#student-index').text(data.student.index_number);
                            $('#student').removeClass('hidden');
                        } else {
                            buzz.play();
                            icon = '<i class="fa fa-times-circle"></i>';
                            box.addClass('box-danger');
                        }

                        $('#message').attr('class', '')
                            .addClass('alert alert-' + data.type)
                            .html(icon + ' ' + data.message);
                    },
                    error: function(xhr, status) {
                        buzz.play();
                        $('#failed').removeClass('hidden');
                    },
                    complete: function() {
                        $('#student-id').val('').focus();
                        $('#mark-attendance, #student-id').prop('disabled', false);
                        $('#saving').addClass('hidden');
                    }
                });

                return false;
            });

            // QR Code Scaning
            var scanner = new Instascan.Scanner({
                video: $('#preview').get(0)
            });

            scanner.addListener('scan', function (content) {
                $('#student-id').val(content);
                $('#attendance-form').submit();
            });
            Instascan.Camera.getCameras().then(function (cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[0]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
        });
    </script>
@endsection
