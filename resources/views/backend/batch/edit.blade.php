@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.batches.management') . ' | ' . trans('labels.backend.batches.edit'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css") }}
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {{ Form::model($batch, ['route' => ['admin.batches.update', $batch], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'put']) }}

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('labels.backend.batches.edit') }}</h3>

                        <div class="box-tools pull-right">
                        </div><!--box-tools pull-right-->
                    </div><!-- /.box-header -->

                    <div class="box-body">
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

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <div class="pull-left">
                                    {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success']) }}
                                </div><!--pull-left-->

                                <div class="pull-right">
                                    {{ link_to_route('admin.batches.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
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
