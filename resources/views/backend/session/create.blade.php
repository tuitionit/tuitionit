@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.sessions.management') . ' | ' . trans('labels.backend.sessions.create'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css") }}

    <style media="screen">
        #repeat-options {
            border-top: 1px solid #ddd;
            padding: 15px 0 0;
        }

        #frequency-type span, #repeat-on span {
            display: inline-block;
            margin-top: 7px;
        }

        #repeat-on span label {
            font-weight: normal;
            margin-right: 5px;
        }

        .ends-on {
            margin-bottom: 15px;
            position: relative;
        }

        .ends-on .ends-on-radio {
            float: left;
            width: 40px;
        }

        .ends-on .ends-on-date {
            margin-left: 50px;
        }

        #count {
            display: inline-block;
            width: 50px;
        }
    </style>
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.sessions.management') }}
        <small>{{ trans('labels.backend.sessions.create') }}</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {{ Form::open(['route' => 'admin.sessions.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('labels.backend.sessions.create') }}</h3>

                        <div class="box-tools pull-right">
                        </div><!--box-tools pull-right-->
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-group {{ $errors->first('name', 'has-error') }}">
                            {{ Form::label('name', trans('validation.attributes.backend.sessions.name'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.sessions.name')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form-group-->

                        <div class="form-group {{ $errors->first('description', 'has-error') }}">
                            {{ Form::label('description', trans('validation.attributes.backend.sessions.description'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::textarea('description', null, ['rows' => 2, 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.sessions.description')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form-group-->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('start_time', 'has-error') }}">
                                    {{ Form::label('start_time', trans('validation.attributes.backend.sessions.start_time'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        <div class="input-group date" id="start-date-picker">
                                            {{ Form::text('start_time', null, ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD HH:mm', 'pattern' => '[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}']) }}
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        <p class="small help-block">
                                            {{ trans('validation.attributes.backend.sessions.help.end_time') }}
                                        </p>
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('end_time', 'has-error') }}">
                                    {{ Form::label('end_time', trans('validation.attributes.backend.sessions.end_time'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        <div class="input-group date" id="end-date-picker">
                                            {{ Form::text('end_time', null, ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD HH:mm', 'pattern' => '[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}']) }}
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        <p class="small help-block">
                                            {{ trans('validation.attributes.backend.sessions.help.end_time') }}
                                        </p>
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('type', 'has-error') }}">
                                    {{ Form::label('type', trans('validation.attributes.backend.sessions.type'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('type', $session->getTypes(), 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('course_id', 'has-error') }}">
                                    {{ Form::label('course', trans('validation.attributes.backend.sessions.course_id'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('course', $courses, 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('subject_id', 'has-error') }}">
                                    {{ Form::label('subject_id', trans('validation.attributes.backend.sessions.subject_id'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('subject_id', $subjects, 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('location_id', 'has-error') }}">
                                    {{ Form::label('location_id', trans('validation.attributes.backend.sessions.location_id'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('location_id', $locations, 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('room_id', 'has-error') }}">
                                    {{ Form::label('room_id', trans('validation.attributes.backend.sessions.room_id'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('room_id', $rooms, 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('batch_id', 'has-error') }}">
                                    {{ Form::label('batch_id', trans('validation.attributes.backend.sessions.batch_id'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('batch_id', $batches, 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('teacher_id', 'has-error') }}">
                                    {{ Form::label('teacher_id', trans('validation.attributes.backend.sessions.teacher_id'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('teacher_id', $teachers, 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('status', trans('validation.attributes.backend.sessions.active'), ['class' => 'col-xs-6 col-lg-4 control-label']) }}

                                    <div class="col-xs-6 col-lg-1">
                                        {{ Form::checkbox('status', '1', true) }}
                                    </div><!--col-lg-1-->
                                </div><!--form-group-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('repeat', trans('validation.attributes.backend.sessions.repeat'), ['class' => 'col-xs-6 col-lg-4 control-label']) }}

                                    <div class="col-xs-6 col-lg-1">
                                        {{ Form::checkbox('repeat', '1', false) }}
                                    </div><!--col-lg-1-->
                                </div><!--form-group-->
                            </div>
                        </div>

                        <div id="repeat-options" class="{{ old('repeat') ? '' : 'hidden' }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('repeat_type', trans('validation.attributes.backend.session_groups.repeat_type'), ['class' => 'col-lg-4 control-label']) }}

                                        <div class="col-lg-8">
                                            {{ Form::select('repeat_type', $sessionGroup->getRepeatTypes(), 'daily', ['class' => 'form-control']) }}
                                        </div><!--col-lg-1-->
                                    </div><!--form-group-->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('frequency', trans('validation.attributes.backend.session_groups.frequency'), ['class' => 'col-lg-4 control-label']) }}

                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    {{ Form::selectRange('frequency', 1, 30, 1, ['class' => 'form-control']) }}
                                                </div>
                                                <div class="col-xs-6" id="frequency-type">
                                                    <span class="days">{{ trans('labels.session_group.frequency.days') }}</span>
                                                    <span class="weeks hidden">{{ trans('labels.session_group.frequency.weeks') }}</span>
                                                    <span class="months hidden">{{ trans('labels.session_group.frequency.months') }}</span>
                                                    <span class="years hidden">{{ trans('labels.session_group.frequency.years') }}</span>
                                                </div>
                                            </div>
                                        </div><!--col-lg-8-->
                                    </div><!--form-group-->
                                </div>
                            </div>

                            <div id="repeat-on" class="form-group {{ old('repeat_type') != 'weekly' ? 'hidden' : '' }}">
                                {{ Form::label('repeat_on', trans('validation.attributes.backend.session_groups.repeat_on'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <span>
                                        {{ Form::checkbox('repeat_on[]', 0, is_array(old('repeat_on')) && in_array('SU', old('repeat_on')), ['id' => 'repeat-on-sunday']) }}
                                        <label for="repeat-on-sunday" title="{{ trans('labels.session_group.repeat_on.sunday') }}">{{ trans('labels.session_group.repeat_on.su') }}</label>
                                    </span>
                                    <span>
                                        {{ Form::checkbox('repeat_on[]', 1, is_array(old('repeat_on')) && in_array('MO', old('repeat_on')), ['id' => 'repeat-on-monday']) }}
                                        <label for="repeat-on-monday" title="{{ trans('labels.session_group.repeat_on.monday') }}">{{ trans('labels.session_group.repeat_on.mo') }}</label>
                                    </span>
                                    <span>
                                        {{ Form::checkbox('repeat_on[]', 2, is_array(old('repeat_on')) && in_array('TU', old('repeat_on')), ['id' => 'repeat-on-tuesday']) }}
                                        <label for="repeat-on-tuesday" title="{{ trans('labels.session_group.repeat_on.tuesday') }}">{{ trans('labels.session_group.repeat_on.tu') }}</label>
                                    </span>
                                    <span>
                                        {{ Form::checkbox('repeat_on[]', 3, is_array(old('repeat_on')) && in_array('WE', old('repeat_on')), ['id' => 'repeat-on-wednesday']) }}
                                        <label for="repeat-on-wednesday" title="{{ trans('labels.session_group.repeat_on.wednesday') }}">{{ trans('labels.session_group.repeat_on.we') }}</label>
                                    </span>
                                    <span>
                                        {{ Form::checkbox('repeat_on[]', 4, is_array(old('repeat_on')) && in_array('TH', old('repeat_on')), ['id' => 'repeat-on-thursday']) }}
                                        <label for="repeat-on-thursday" title="{{ trans('labels.session_group.repeat_on.thursday') }}">{{ trans('labels.session_group.repeat_on.th') }}</label>
                                    </span>
                                    <span>
                                        {{ Form::checkbox('repeat_on[]', 5, is_array(old('repeat_on')) && in_array('FR', old('repeat_on')), ['id' => 'repeat-on-friday']) }}
                                        <label for="repeat-on-friday" title="{{ trans('labels.session_group.repeat_on.friday') }}">{{ trans('labels.session_group.repeat_on.fr') }}</label>
                                    </span>
                                    <span>
                                        {{ Form::checkbox('repeat_on[]', 6, is_array(old('repeat_on')) && in_array('SA', old('repeat_on')), ['id' => 'repeat-on-saturday']) }}
                                        <label for="repeat-on-saturday" title="{{ trans('labels.session_group.repeat_on.saturday') }}">{{ trans('labels.session_group.repeat_on.sa') }}</label>
                                    </span>
                                </div><!--col-lg-1-->
                            </div><!--form-group-->

                            <div id="repeat-by" class="form-group {{ old('repeat_type') != 'monthly' ? 'hidden' : '' }}">
                                {{ Form::label('repeat_by', trans('validation.attributes.backend.session_groups.repeat_by'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    <span>
                                        {{ Form::radio('repeat_by', 'dom', !old('repeat_on') || old('repeat_on') == 'day-of-month', ['id' => 'repeat-by-day-of-month']) }}
                                        <label for="repeat-by-day-of-month">{{ trans('labels.session_group.repeat_by.day_of_month') }}</label>
                                    </span>
                                    <span>
                                        {{ Form::radio('repeat_by', 'dow', old('repeat_on') == 'day-of-week', ['id' => 'repeat-by-day-of-week']) }}
                                        <label for="repeat-by-day-of-week">{{ trans('labels.session_group.repeat_by.day_of_week') }}</label>
                                    </span>
                                </div><!--col-lg-1-->
                            </div><!--form-group-->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->first('start_date', 'has-error') }}">
                                        {{ Form::label('start_date', trans('validation.attributes.backend.session_groups.start'), ['class' => 'col-lg-4 control-label']) }}

                                        <div class="col-lg-8">
                                            <div class="input-group date" id="start-on-date-picker">
                                                {{ Form::text('start_date', null, ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD', 'pattern' => '[0-9]{4}-[0-9]{2}-[0-9]{2}']) }}
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div><!--col-lg-10-->
                                    </div><!--form-group-->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->first('end_date', 'has-error') }}">
                                        {{ Form::label('end', trans('validation.attributes.backend.session_groups.end'), ['class' => 'col-lg-4 control-label']) }}

                                        <div class="col-lg-8">
                                            <div class="ends-on">
                                                <div class="ends-on-radio">
                                                    {{ Form::radio('end', 'on', !old('end') || old('end') == 'on', ['id' => 'ends-on']) }}
                                                    <span>{{ trans('validation.attributes.backend.session_groups.ends_on') }}</span>
                                                </div>
                                                <div class="ends-on-date">
                                                    <div class="input-group date" id="end-on-date-picker">
                                                        {{ Form::text('end_date', null, ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD', 'pattern' => '[0-9]{4}-[0-9]{2}-[0-9]{2}']) }}
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    {{ Form::radio('end', 'after', old('end') == 'after', ['id' => 'ends-after']) }}
                                                    <span>{!! trans('validation.attributes.backend.session_groups.ends_after', ['input' => Form::text('count', old('count'), ['class' => 'form-control', 'id' => 'count', 'disabled' => (!old('end') || old('end') == 'on')])]) !!}</span>
                                                </div>
                                            </div>
                                        </div><!--col-lg-10-->
                                    </div><!--form-group-->
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <div class="pull-left">
                                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success']) }}
                                </div><!--pull-left-->

                                <div class="pull-right">
                                    {{ link_to_route('admin.sessions.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
                                </div><!--pull-right-->

                                <div class="clearfix"></div>
                            </div>
                        </div><!-- /.form-group -->
                    </div><!-- /.box-body -->
                </div><!--box-->

            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('after-scripts')
    {{ Html::script("js/plugins/moment/moment.min.js") }}
    {{ Html::script("js/backend/plugin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js") }}

    <script>
        $(function() {
            $('#start-date-picker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm'
            });

            $('#end-date-picker').datetimepicker({
                format: 'YYYY-MM-DD HH:mm'
            });

            var startDatePicker = $('#start-date-picker').data('DateTimePicker');
            var endDatePicker = $('#end-date-picker').data('DateTimePicker');

            $('#start-date-picker').on('dp.change', function(evt) {
                endDatePicker.minDate(startDatePicker.date());
                endDatePicker.date(moment.max(startDatePicker.date(), endDatePicker.date()));
            });

            $('#repeat').on('change', function() {
                $('#repeat-options').toggleClass('hidden', !$(this).is(':checked'));
            });

            $('#repeat_type').on('change', function() {
                var type = $(this).val();
                var label = 'days';
                $('#frequency-type span').addClass('hidden');
                switch(type) {
                    case 'weekly': label = 'weeks'; break;
                    case 'monthly': label = 'months'; break;
                    case 'yearly': label = 'years'; break;
                    default: label = 'days';
                }

                $('#frequency-type span.' + label).removeClass('hidden');
                $('#repeat-on').toggleClass('hidden', type != 'weekly');
                $('#repeat-by').toggleClass('hidden', type != 'monthly');
            });

            $('#start-on-date-picker').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $('#end-on-date-picker').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            var startOnDatePicker = $('#start-on-date-picker').data('DateTimePicker');
            var endOnDatePicker = $('#end-on-date-picker').data('DateTimePicker');

            $('#start-on-date-picker').on('dp.change', function(evt) {
                endOnDatePicker.minDate(startOnDatePicker.date());
                endOnDatePicker.date(moment.max(startOnDatePicker.date(), endOnDatePicker.date()));
            });

            $('#ends-on').on('change', function() {
                if($(this).is(':checked')) {
                    $('#count').prop('disabled', true);
                    endOnDatePicker.enable();
                }
            });

            $('#ends-after').on('change', function() {
                if($(this).is(':checked')) {
                    endOnDatePicker.disable();
                    $('#count').prop('disabled', false);
                }
            });
        });
    </script>
@endsection
