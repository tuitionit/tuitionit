@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.payments.management') . ' | ' . trans('labels.backend.payments.create'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css") }}
    {{ Html::style("css/backend/plugin/select2/select2.min.css") }}
    {{ Html::style("css/backend/plugin/select2/select2-bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.payments.management') }}
        <small>{{ trans('labels.backend.payments.create') }}</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {{ Form::open(['route' => 'admin.payments.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('labels.backend.payments.create') }}</h3>

                        <div class="box-tools pull-right">
                        </div><!--box-tools pull-right-->
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-group {{ $errors->first('student_id', 'has-error') }}">
                            {{ Form::label('student_id', trans('validation.attributes.backend.payments.student_id'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::select('student_id', [], 'standard', ['class' => 'form-control']) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group {{ $errors->first('amount', 'has-error') }}">
                            {{ Form::label('amount', trans('validation.attributes.backend.payments.amount'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('amount', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.payments.amount')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('type', 'has-error') }}">
                                    {{ Form::label('type', trans('validation.attributes.backend.payments.type'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('type', $payment->getTypes(), 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form control-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('location_id', 'has-error') }}">
                                    {{ Form::label('location_id', trans('validation.attributes.backend.payments.location_id'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('location_id', $locations, 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form control-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('course', 'has-error') }}">
                                    {{ Form::label('course', trans('validation.attributes.backend.payments.course'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('course', $courses, 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form control-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('subject', 'has-error') }}">
                                    {{ Form::label('subject', trans('validation.attributes.backend.payments.subject'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('subject', $subjects, 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form control-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('start_date', 'has-error') }}">
                                    {{ Form::label('start_date', trans('validation.attributes.backend.payments.start_date'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        <div class="input-group date" id="start-date-picker">
                                            {{ Form::text('start_date', null, ['class' => 'form-control', 'placeholder' => 'DD/MM/YYYY', 'pattern' => '[0-9]{2}/[0-9]{2}/[0-9]{4}']) }}
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        <p class="small help-block">
                                            {{ trans('validation.attributes.backend.payments.help.end_date') }}
                                        </p>
                                    </div><!--col-lg-10-->
                                </div><!--form control-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('end_date', 'has-error') }}">
                                    {{ Form::label('end_date', trans('validation.attributes.backend.payments.end_date'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        <div class="input-group date" id="end-date-picker">
                                            {{ Form::text('end_date', null, ['class' => 'form-control', 'placeholder' => 'DD/MM/YYYY', 'pattern' => '[0-9]{2}/[0-9]{2}/[0-9]{4}']) }}
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        <p class="small help-block">
                                            {{ trans('validation.attributes.backend.payments.help.end_date') }}
                                        </p>
                                    </div><!--col-lg-10-->
                                </div><!--form control-->
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('status', trans('validation.attributes.backend.payments.active'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-1">
                                {{ Form::checkbox('status', '1', true) }}
                            </div><!--col-lg-1-->
                        </div><!--form control-->

                        <div class="form-group {{ $errors->first('notes', 'has-error') }}">
                            {{ Form::label('notes', trans('validation.attributes.backend.payments.notes'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::textarea('notes', null, ['rows' => 2, 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.payments.notes')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <div class="pull-left">
                                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success']) }}
                                </div><!--pull-left-->

                                <div class="pull-right">
                                    {{ link_to_route('admin.payments.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
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
    {{ Html::script("js/backend/plugin/select2/select2.full.min.js") }}

    <script>
        $(document).ready(function() {
            $('#student_id').select2({
                theme: 'bootstrap',
                multiple: false,
                ajax: {
                    url: "{{ route('admin.students.list') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            name: params.term,
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        return {
                            results: data
                        };
                    },
                },
                width: '100%'
            });

            $('#start-date-picker').datetimepicker({
                format: 'DD/MM/YYYY'
            });

            $('#end-date-picker').datetimepicker({
                format: 'DD/MM/YYYY'
            });

            var startDatePicker = $('#start-date-picker').data('DateTimePicker');
            var endDatePicker = $('#end-date-picker').data('DateTimePicker');

            $('#start-date-picker').on('dp.change', function(evt) {
                endDatePicker.minDate(startDatePicker.date());
                endDatePicker.date(moment.max(startDatePicker.date(), endDatePicker.date()));
            });
        });
    </script>
@endsection
