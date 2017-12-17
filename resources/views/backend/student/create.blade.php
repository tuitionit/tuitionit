@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.students.management') . ' | ' . trans('labels.backend.students.create'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/select2/select2.min.css") }}
    {{ Html::style("css/backend/plugin/select2/select2-bootstrap.min.css") }}
@stop

@section('content')
    {{ Form::open(['route' => 'admin.students.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

    <div class="col-lg-8 col-lg-offset-2">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.students.create') }}</h3>

                <div class="box-tools pull-right">
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->first('index_number', 'has-error') }}">
                            {{ Form::label('index_number', trans('validation.attributes.backend.students.index_number'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('index_number', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.students.index_number')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group {{ $errors->first('name', 'has-error') }}">
                            {{ Form::label('name', trans('validation.attributes.backend.students.name'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.students.name')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group {{ $errors->first('phone', 'has-error') }}">
                            {{ Form::label('phone', trans('validation.attributes.backend.students.phone'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.students.phone')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('status', trans('validation.attributes.backend.students.active'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-1">
                                {{ Form::checkbox('status', '1', true) }}
                            </div><!--col-lg-1-->
                        </div><!--form control-->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->first('user_id', 'has-error') }}">
                            {{ Form::label('user_id', trans('validation.attributes.backend.students.user_id'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::select('user_id', $user, null, ['id' => 'user-selector', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.students.user_id')]) }}
                                <p class="small help-block">
                                    {{ trans('validation.attributes.backend.students.help.user_id') }}
                                </p>
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                        <div class="form-group {{ $errors->first('parent_id', 'has-error') }}">
                            {{ Form::label('parent_id', trans('validation.attributes.backend.students.parent_id'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::select('parent_id', $parent, null, ['id' => 'parent-selector', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.students.parent_id')]) }}
                                <p class="small help-block">
                                    {{ trans('validation.attributes.backend.students.help.parent_id') }}
                                </p>
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                        <div class="form-group {{ $errors->first('locations', 'has-error') }}">
                            {{ Form::label('locations', trans('validation.attributes.backend.students.locations'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::select('locations[]', $locations, null, ['id' => 'location-selector', 'class' => 'form-control', 'multiple' => true]) }}
                                <p class="small help-block">
                                    {{ trans('validation.attributes.backend.students.help.locations') }}
                                </p>
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <div class="row">
                    <div class="col-lg-11 col-lg-offset-1">
                        <div class="row">
                            <div class="col-xs-6 col-md-2 col-md-offset-6">
                                {{ link_to_route('admin.students.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-default btn-block']) }}
                            </div>
                            <div class="col-xs-6 col-md-4">
                                {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success btn-block']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-footer -->
        </div><!--box-->
    </div>

    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script("js/backend/plugin/select2/select2.full.min.js") }}

    <script>
        $(document).ready(function() {
            $('#user-selector').select2({
                theme: 'bootstrap',
                placeholder: '{{ trans('validation.attributes.backend.students.user_id') }}',
                allowClear: true,
                ajax: {
                    url: "{{ route('admin.users.list', ['type' => 'student']) }}",
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

            $('#parent-selector').select2({
                theme: 'bootstrap',
                placeholder: '{{ trans('validation.attributes.backend.students.parent_id') }}',
                allowClear: true,
                ajax: {
                    url: "{{ route('admin.users.list', ['type' => 'parent']) }}",
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

            $('#location-selector').select2({
                theme: 'bootstrap',
                multiple: true,
                placeholder: '{{ trans('validation.attributes.backend.students.locations') }}',
                width: '100%'
            });
        });
    </script>
@endsection
