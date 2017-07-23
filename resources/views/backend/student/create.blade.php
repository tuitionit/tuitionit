@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.students.management') . ' | ' . trans('labels.backend.students.create'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/select2/select2.min.css") }}
    {{ Html::style("css/backend/plugin/select2/select2-bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.students.management') }}
        <small>{{ trans('labels.backend.students.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.students.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.students.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.includes.partials.students-header-buttons')
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
                                {{ Form::select('user_id', [], null, ['id' => 'user-selector', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.students.user_id')]) }}
                                <p class="small help-block">
                                    {{ trans('validation.attributes.backend.students.help.user_id') }}
                                </p>
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                        <div class="form-group {{ $errors->first('parent_id', 'has-error') }}">
                            {{ Form::label('parent_id', trans('validation.attributes.backend.students.parent_id'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::select('parent_id', [], null, ['id' => 'parent-selector', 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.students.parent_id')]) }}
                                <p class="small help-block">
                                    {{ trans('validation.attributes.backend.students.help.parent_id') }}
                                </p>
                            </div><!--col-lg-10-->
                        </div><!--form control-->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-11 col-lg-offset-1">
                        <div class="pull-left">
                            {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success']) }}

                            @if(isset($batch))
                                <input type="hidden" name="batch_id" value="{{ $batch }}">
                            @endif
                        </div><!--pull-left-->

                        <div class="pull-right">
                            {{ link_to_route('admin.students.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
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
        $(document).ready(function() {
            $('#user-selector').select2({
                theme: 'bootstrap',
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
        });
    </script>
@endsection
