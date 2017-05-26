@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.locations.management') . ' | ' . trans('labels.backend.locations.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.locations.management') }}
        <small>{{ trans('labels.backend.locations.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($location, ['route' => ['admin.locations.update', $location], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'put']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.locations.create') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.includes.partials.locations-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group {{ $errors->first('name', 'has-error') }}">
                    {{ Form::label('name', trans('validation.attributes.backend.locations.name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group {{ $errors->first('code', 'has-error') }}">
                    {{ Form::label('code', trans('validation.attributes.backend.locations.code'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('code', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.code')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group {{ $errors->first('domain', 'has-error') }}">
                    {{ Form::label('domain', trans('validation.attributes.backend.locations.domain'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('domain', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.domain')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->


                <div class="form-group">
                    {{ Form::label('status', trans('validation.attributes.backend.locations.active'), ['class' => 'col-lg-2 control-label']) }}

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
                            {{ link_to_route('admin.locations.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
                        </div><!--pull-right-->

                        <div class="clearfix"></div>
                    </div>
                </div><!-- /.form-group -->
            </div><!-- /.box-body -->
        </div><!--box-->


    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
@endsection
