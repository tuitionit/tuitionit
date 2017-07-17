@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.rooms.management') . ' | ' . trans('labels.backend.rooms.create'))

@section('page-header')
    <h1>
        {{ $location->name }}
        <small>{{ trans('labels.backend.rooms.create') }}</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-6 col-md-offset-2 col-md-offset-3">

            {{ Form::open(['route' => ['admin.locations.rooms.store', $location], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('labels.backend.rooms.create') }}</h3>
                    </div><!-- /.box-header -->

                    <div class="box-body">
                        <div class="form-group {{ $errors->first('name', 'has-error') }}">
                            {{ Form::label('name', trans('validation.attributes.backend.rooms.name'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.rooms.name')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group {{ $errors->first('description', 'has-error') }}">
                            {{ Form::label('description', trans('validation.attributes.backend.rooms.description'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::textarea('description', null, ['rows' => 2, 'class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.rooms.description')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('capacity', trans('validation.attributes.backend.rooms.capacity'), ['class' => 'col-lg-4 control-label']) }}

                                    <div class="col-lg-8">
                                        {{ Form::text('capacity', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.rooms.capacity')]) }}
                                    </div><!--col-lg-1-->
                                </div><!--form control-->
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::label('has_blackboard', trans('validation.attributes.backend.rooms.has_blackboard'), ['class' => 'col-xs-6 col-sm-4 control-label']) }}

                                    <div class="col-xs-6 col-sm-8">
                                        {{ Form::checkbox('has_blackboard', '1', true) }}
                                    </div><!--col-lg-1-->
                                </div><!--form control-->
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::label('has_whiteboard', trans('validation.attributes.backend.rooms.has_whiteboard'), ['class' => 'col-xs-6 col-md-8 control-label']) }}

                                    <div class="col-xs-6 col-md-4">
                                        {{ Form::checkbox('has_whiteboard', '1', true) }}
                                    </div><!--col-lg-1-->
                                </div><!--form control-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::label('has_projector', trans('validation.attributes.backend.rooms.has_projector'), ['class' => 'col-xs-6 col-sm-4 control-label']) }}

                                    <div class="col-xs-6 col-sm-8">
                                        {{ Form::checkbox('has_projector', '1', true) }}
                                    </div><!--col-lg-1-->
                                </div><!--form control-->
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{ Form::label('is_airconditioned', trans('validation.attributes.backend.rooms.is_airconditioned'), ['class' => 'col-xs-6 col-md-8 control-label']) }}

                                    <div class="col-xs-6 col-md-4">
                                        {{ Form::checkbox('is_airconditioned', '1', true) }}
                                    </div><!--col-lg-1-->
                                </div><!--form control-->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <div class="pull-left">
                                    {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-success']) }}
                                </div><!--pull-left-->

                                <div class="pull-right">
                                    {{ link_to_route('admin.rooms.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
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
    {{ Html::script('js/backend/access/users/script.js') }}
@endsection
