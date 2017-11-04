@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.payments.management') . ' | ' . trans('labels.backend.payments.create'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css") }}
    {{ Html::style("css/backend/plugin/select2/select2.min.css") }}
    {{ Html::style("css/backend/plugin/select2/select2-bootstrap.min.css") }}
@stop

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
                                {{ Form::select('student_id', $student, null, ['class' => 'form-control']) }}
                            </div><!--col-lg-10-->
                        </div><!--form-group-->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('amount', 'has-error') }}">
                                    {{ Form::label('amount', trans('validation.attributes.backend.payments.amount'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::text('amount', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.payments.amount')]) }}
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('payment_method', 'has-error') }}">
                                    {{ Form::label('payment_method', trans('validation.attributes.backend.payments.payment_method'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('payment_method', $payment->getPaymentMethods(), 'monthly', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('type', 'has-error') }}">
                                    {{ Form::label('type', trans('validation.attributes.backend.payments.type'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('type', $payment->getTypes(), 'standard', ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                            <div class="col-md-6" id="type-options">
                                <div class="form-group {{ $errors->first('month', 'has-error') }} {{ old('type') && old('type') != 'monthly' ? 'hidden' : '' }}" id="month-form-group">
                                    {{ Form::label('month', trans('validation.attributes.backend.payments.month'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        <div class="input-group date" id="start-date-picker">
                                            {{ Form::text('month', null, ['class' => 'form-control', 'pattern' => '[a-zA-z]{*} [0-9]{4}']) }}
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        <p class="small help-block">
                                            {{ trans('validation.attributes.backend.payments.help.month') }}
                                        </p>
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->

                                <div class="form-group {{ $errors->first('installment', 'has-error') }} {{ old('type') != 'installment' ? 'hidden' : '' }}" id="installment-form-group">
                                    {{ Form::label('installment', trans('validation.attributes.backend.payments.installment'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::selectRange('installment', 1, 20, 1, ['class' => 'form-control']) }}
                                        <p class="small help-block">
                                            {{ trans('validation.attributes.backend.payments.help.installment') }}
                                        </p>
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->

                                <div class="form-group {{ $errors->first('session_id', 'has-error') }} {{ old('type') != 'session' ? 'hidden' : '' }}" id="session-form-group">
                                    {{ Form::label('session_id', trans('validation.attributes.backend.payments.session_id'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('session_id', $session, null, ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('paid_by', 'has-error') }}">
                                    {{ Form::label('paid_by', trans('validation.attributes.backend.payments.paid_by'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('paid_by', $payer, null, ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ $errors->first('paid_to', 'has-error') }}">
                                    {{ Form::label('paid_to', trans('validation.attributes.backend.payments.paid_to'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::select('paid_to', $payee, null, ['class' => 'form-control']) }}
                                    </div><!--col-lg-10-->
                                </div><!--form-group-->
                            </div>
                        </div>

                        <div class="form-group {{ $errors->first('notes', 'has-error') }}">
                            {{ Form::label('notes', trans('validation.attributes.backend.payments.notes'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::textarea('notes', null, ['rows' => 2, 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.payments.notes')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form-group-->

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <div class="pull-left">
                                    {{ Form::submit(trans('buttons.backend.payment.add_payment'), ['class' => 'btn btn-success']) }}
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

            $('#session_id').select2({
                theme: 'bootstrap',
                multiple: false,
                ajax: {
                    url: "{{ route('admin.sessions.list') }}",
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

            $('#paid_by').select2({
                theme: 'bootstrap',
                multiple: false,
                ajax: {
                    url: "{{ route('admin.users.list') }}",
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

            $('#paid_to').select2({
                theme: 'bootstrap',
                multiple: false,
                ajax: {
                    url: "{{ route('admin.users.list') }}",
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
                if(type == 'session') {
                    $('#session-form-group').removeClass('hidden');
                }
            });
        });
    </script>
@endsection
