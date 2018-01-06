@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.batches.management') . ' | ' . trans('labels.backend.batches.create'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.batches.create') }}
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.batches.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}
        <div class="box box-success box-form">
            <div class="box-header">
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                        <div class="form-group {{ $errors->first('name', 'has-error') }}">
                            {{ Form::label('name', trans('validation.attributes.backend.batches.name'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.batches.name')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group {{ $errors->first('description', 'has-error') }}">
                            {{ Form::label('description', trans('validation.attributes.backend.batches.description'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::textarea('description', null, ['rows' => 2, 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.batches.description')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('type', 'has-error') }}">
                                    {{ Form::label('type', trans('validation.attributes.backend.batches.type'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('type', $batch->getTypes(), 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form control-->
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('course_id', 'has-error') }}">
                                    {{ Form::label('course_id', trans('validation.attributes.backend.batches.course_id'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('course_id', $courses, 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form control-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('location_id', 'has-error') }}">
                                    {{ Form::label('location_id', trans('validation.attributes.backend.batches.location_id'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('location_id', $locations, 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form control-->
                                <?php /*
                                <div class="form-group {{ $errors->first('subject', 'has-error') }}">
                                    {{ Form::label('subject', trans('validation.attributes.backend.batches.subject'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('subject', $subjects, 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form control-->
                                */ ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('start_date', 'has-error') }}">
                                    {{ Form::label('start_date', trans('validation.attributes.backend.batches.start_date'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        <div class="input-group date" id="start-date-picker">
                                            {{ Form::text('start_date', null, ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD', 'pattern' => '[0-9]{4}-[0-9]{2}-[0-9]{2}']) }}
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        <p class="small help-block">
                                            {{ trans('validation.attributes.backend.batches.help.end_date') }}
                                        </p>
                                    </div><!--col-lg-10-->
                                </div><!--form control-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('end_date', 'has-error') }}">
                                    {{ Form::label('end_date', trans('validation.attributes.backend.batches.end_date'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        <div class="input-group date" id="end-date-picker">
                                            {{ Form::text('end_date', null, ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD', 'pattern' => '[0-9]{4}-[0-9]{2}-[0-9]{2}']) }}
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        <p class="small help-block">
                                            {{ trans('validation.attributes.backend.batches.help.end_date') }}
                                        </p>
                                    </div><!--col-lg-10-->
                                </div><!--form control-->
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('status', trans('validation.attributes.backend.batches.active'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-1">
                                {{ Form::checkbox('status', '1', true) }}
                            </div><!--col-lg-1-->
                        </div><!--form control-->
                    </div>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                        <div class="row">
                            <div class="col-xs-6 col-md-4 col-md-offset-2 col-lg-2 col-lg-offset-6">
                                {{ link_to_route('admin.batches.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-default btn-block']) }}
                            </div>
                            <div class="col-xs-6 col-md-6 col-lg-4">
                                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-block']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-footer -->
        </div><!--box-->
    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script("js/plugins/moment/moment.min.js") }}
    {{ Html::script("js/backend/plugin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js") }}

    <script>
        $(function() {
            $('#start-date-picker').datetimepicker({
                format: 'YYYY-MM-DD'
            });

            $('#end-date-picker').datetimepicker({
                format: 'YYYY-MM-DD'
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
