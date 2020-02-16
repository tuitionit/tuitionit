{{ Form::model($assignment, ['route' => $assignment->exists ? ['admin.assignments.update', $assignment] : ['admin.assignments.store'], 'class' => 'form-horizontal', 'role' => 'form', 'method' => $assignment->exists ? 'put' : 'post']) }}
    <div class="box box-success box-form">
        <div class="box-header">
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                    <div class="form-group {{ $errors->first('name', 'has-error') }}">
                        {{ Form::label('name', trans('validation.attributes.backend.assignments.name'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.assignments.name')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group {{ $errors->first('description', 'has-error') }}">
                        {{ Form::label('description', trans('validation.attributes.backend.assignments.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('description', null, ['rows' => 2, 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.assignments.description')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->first('type', 'has-error') }}">
                                {{ Form::label('type', trans('validation.attributes.backend.assignments.type'), ['class' => 'col-lg-4 control-label']) }}

                                <div class="col-lg-8">
                                    {{ Form::select('type', $assignment->getTypes(), 'standard', ['class' => 'form-control']) }}
                                </div><!--col-lg-10-->
                            </div><!--form-group-->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->first('subject_id', 'has-error') }}">
                                {{ Form::label('subject_id', trans('validation.attributes.backend.assignments.subject_id'), ['class' => 'col-lg-4 control-label']) }}

                                <div class="col-lg-8">
                                    {{ Form::select('subject_id', $subjects, 'standard', ['class' => 'form-control']) }}
                                </div><!--col-lg-10-->
                            </div><!--form-group-->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->first('start_time', 'has-error') }}">
                                {{ Form::label('start_time', trans('validation.attributes.backend.assignments.start_time'), ['class' => 'col-lg-4 control-label']) }}

                                <div class="col-lg-8">
                                    <div class="input-group date" id="start-date-picker">
                                        {{ Form::text('start_time', null, ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD HH:mm', 'pattern' => '[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}']) }}
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <p class="small help-block">
                                        {{ trans('validation.attributes.backend.assignments.help.end_time') }}
                                    </p>
                                </div><!--col-lg-10-->
                            </div><!--form-group-->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->first('end_time', 'has-error') }}">
                                {{ Form::label('end_time', trans('validation.attributes.backend.assignments.end_time'), ['class' => 'col-lg-4 control-label']) }}

                                <div class="col-lg-8">
                                    <div class="input-group date" id="end-date-picker">
                                        {{ Form::text('end_time', null, ['class' => 'form-control', 'placeholder' => 'YYYY-MM-DD HH:mm', 'pattern' => '[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}']) }}
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <p class="small help-block">
                                        {{ trans('validation.attributes.backend.assignments.help.end_time') }}
                                    </p>
                                </div><!--col-lg-10-->
                            </div><!--form-group-->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->first('course_id', 'has-error') }}">
                                {{ Form::label('course_id', trans('validation.attributes.backend.assignments.course_id'), ['class' => 'col-lg-4 control-label']) }}

                                <div class="col-lg-8">
                                    {{ Form::select('course_id', $courses, 'standard', ['class' => 'form-control']) }}
                                </div><!--col-lg-10-->
                            </div><!--form-group-->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->first('batch_id', 'has-error') }}">
                                {{ Form::label('batch_id', trans('validation.attributes.backend.assignments.batch_id'), ['class' => 'col-lg-4 control-label']) }}

                                <div class="col-lg-8">
                                    {{ Form::select('batch_id', $batches, 'standard', ['class' => 'form-control']) }}
                                </div><!--col-lg-10-->
                            </div><!--form-group-->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group {{ $errors->first('location_id', 'has-error') }}">
                            {{ Form::label('location_id', trans('validation.attributes.backend.assignments.location_id'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                {{ Form::select('location_id', $locations, 'standard', ['class' => 'form-control']) }}
                            </div><!--col-lg-10-->
                        </div><!--form-group-->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->first('room_id', 'has-error') }}">
                                {{ Form::label('room_id', trans('validation.attributes.backend.assignments.room_id'), ['class' => 'col-lg-4 control-label']) }}

                                <div class="col-lg-8">
                                    {{ Form::select('room_id', $rooms, 'standard', ['class' => 'form-control']) }}
                                </div><!--col-lg-10-->
                            </div><!--form-group-->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->first('teacher_id', 'has-error') }}">
                                {{ Form::label('teacher_id', trans('validation.attributes.backend.assignments.teacher_id'), ['class' => 'col-lg-4 control-label']) }}

                                <div class="col-lg-8">
                                    {{ Form::select('teacher_id', $teachers, 'standard', ['class' => 'form-control']) }}
                                </div><!--col-lg-10-->
                            </div><!--form-group-->
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>

                    <div class="form-group {{ $errors->first('teacher_comment', 'has-error') }}">
                        {{ Form::label('teacher_comment', trans('validation.attributes.backend.assignments.teacher_comment'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::textarea('teacher_comment', null, ['rows' => 2, 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.assignments.teacher_comment')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form-group-->
                </div>
            </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                    <div class="row">
                        <div class="col-xs-6 col-md-2 col-md-offset-6">
                            {{ link_to_route('admin.assignments.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-default btn-block']) }}
                        </div>
                        <div class="col-xs-6 col-md-4">
                            {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-block']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.box-footer -->
    </div><!--box-->
{{ Form::close() }}

@section('after-styles')
    {{ Html::style("css/backend/plugin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css") }}
    {{ Html::style("css/backend/plugin/select2/select2.min.css") }}
    {{ Html::style("css/backend/plugin/select2/select2-bootstrap.min.css") }}
@stop

@section('after-scripts')
    {{ Html::script("js/plugins/moment/moment.min.js") }}
    {{ Html::script("js/backend/plugin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js") }}
    {{ Html::script("js/backend/plugin/select2/select2.full.min.js") }}

    <script>
        $(document).ready(function() {
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

            $('#student_id').select2({
                theme: 'bootstrap',
                placeholder: '{{ trans('validation.attributes.backend.assignments.student_id') }}',
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

            {{--
            $('#course_id').select2({
                theme: 'bootstrap',
                placeholder: '{{ trans('validation.attributes.backend.assignments.course_id') }}',
                multiple: false,
                ajax: {
                    url: "{{ route('admin.courses.list') }}",
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
            --}}

            $('#batch_id').select2({
                theme: 'bootstrap',
                placeholder: '{{ trans('validation.attributes.backend.assignments.batch_id') }}',
                allowClear: false,
                ajax: {
                    url: "{{ route('admin.batches.list') }}",
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

            $('#month').datetimepicker({
                format: 'MMMM YYYY',
                defaultDate: 'now'
            });

            $('#type').on('change', function() {
                var type = $(this).val();
                $('#type-options .form-group').addClass('hidden');
                if(type == 'monthly') {
                    $('#month-form-group').removeClass('hidden');
                }
                if(type == 'installment') {
                    $('#installment-form-group').removeClass('hidden');
                }
                if(type == 'assignment') {
                    $('#assignment-form-group').removeClass('hidden');
                }
            });
        });
    </script>
@endsection
