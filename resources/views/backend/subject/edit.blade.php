@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.subjects.management') . ' | ' . trans('labels.backend.subjects.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.subjects.edit') }}
    </h1>
@endsection

@section('content')
    {{ Form::model($subject, ['route' => ['admin.subjects.update', $subject], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'put']) }}
    <div class="box box-warning box-form">
        <div class="box-header">

        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group {{ $errors->first('name', 'has-error') }}">
                        {{ Form::label('name', trans('validation.attributes.backend.subjects.name'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.subjects.name')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group {{ $errors->first('description', 'has-error') }}">
                        {{ Form::label('description', trans('validation.attributes.backend.subjects.description'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-10">
                            {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.subjects.description')]) }}
                        </div><!--col-lg-10-->
                    </div><!--form control-->

                    <div class="form-group">
                        {{ Form::label('status', trans('validation.attributes.backend.subjects.active'), ['class' => 'col-lg-2 control-label']) }}

                        <div class="col-lg-1">
                            {{ Form::checkbox('status', '1', true) }}
                        </div><!--col-lg-1-->
                    </div><!--form control-->
                </div>
            </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="row">
                        <div class="col-xs-6 col-md-4 col-md-offset-2 col-lg-2 col-lg-offset-6">
                            {{ link_to_route('admin.institute', trans('buttons.general.cancel'), [], ['class' => 'btn btn-default btn-block']) }}
                        </div>
                        <div class="col-xs-6 col-md-6 col-lg-4">
                            {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-warning btn-block']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.box-footer -->
    </div><!--box-->
    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
@endsection
