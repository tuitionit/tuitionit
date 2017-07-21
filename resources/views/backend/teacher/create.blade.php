@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.teachers.management') . ' | ' . trans('labels.backend.teachers.create'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/select2/select2.min.css") }}
    {{ Html::style("css/backend/plugin/select2/select2-bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.teachers.management') }}
        <small>{{ trans('labels.backend.teachers.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.teachers.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.teachers.create') }}</h3>

                <div class="box-tools pull-right">
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->first('name', 'has-error') }}">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-10">
                                <p>
                                    <a href="#show-users" id="show-users" class="btn btn-default"><i class="fa fa-user-o"></i> {{ trans('strings.backend.teachers.select_user') }}</a>
                                </p>
                                <p class="text-muted small">{{ trans('strings.backend.teachers.select_user_description') }}</p>
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group {{ $errors->first('user_id', 'has-error') }} hidden" id="users">
                            {{ Form::label('user_id', trans('validation.attributes.backend.teachers.user_id'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::select('user_id', [], null, ['id' => 'user-selector', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.teachers.user_id')]) }}
                                <p class="small help-block">
                                    {{ trans('validation.attributes.backend.teachers.help.user_id') }}
                                </p>
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group {{ $errors->first('title', 'has-error') }}">
                            {{ Form::label('title', trans('validation.attributes.backend.teachers.title'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::select('title', $teacher->getTitles(), '', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.teachers.title')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group {{ $errors->first('name', 'has-error') }}">
                            {{ Form::label('name', trans('validation.attributes.backend.teachers.name'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('name', null, ['id' => 'teacher-name', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.teachers.name')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group {{ $errors->first('short_name', 'has-error') }}">
                            {{ Form::label('short_name', trans('validation.attributes.backend.teachers.short_name'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('short_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.teachers.short_name')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group {{ $errors->first('bio', 'has-error') }}">
                            {{ Form::label('bio', trans('validation.attributes.backend.teachers.bio'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::textarea('bio', null, ['rows' => 2, 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.teachers.bio')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('status', trans('validation.attributes.backend.teachers.active'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-1">
                                {{ Form::checkbox('status', '1', true) }}
                            </div><!--col-lg-1-->
                        </div><!--form control-->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->first('subjects', 'has-error') }}" id="subjects">
                            {{ Form::label('subjects', trans('validation.attributes.backend.teachers.subjects'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::select('subjects[]', [], null, ['id' => 'subject-selector', 'class' => 'form-control']) }}
                                <p class="small help-block">
                                    {{ trans('validation.attributes.backend.teachers.help.subjects') }}
                                </p>
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-11 col-lg-offset-1">
                        <div class="pull-left">
                            {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success']) }}
                        </div><!--pull-left-->

                        <div class="pull-right">
                            {{ link_to_route('admin.teachers.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
                        </div><!--pull-right-->

                        <div class="clearfix"></div>
                    </div>
                </div><!-- /.form-group -->

            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script("js/backend/plugin/select2/select2.full.min.js") }}

    <script>
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};

        $(document).ready(function() {
            $('#user-selector').select2({
                theme: 'bootstrap',
                ajax: {
                    url: "{{ route('admin.users.list', ['type' => 'teacher']) }}",
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

            $('#user-selector').on('change', function(evt) {
                var data = $(this).select2('data');
                $('#teacher-name').val(data[0].text).prop('disabled', data.length != 0);
            });

            $('#show-users').click(function() {
                $('#users').removeClass('hidden');
                $(this).closest('.form-group').hide();
            });

            $('#subject-selector').select2({
                theme: 'bootstrap',
                multiple: true,
                ajax: {
                    url: "{{ route('admin.subjects.list') }}",
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
        });
    </script>
@endsection
