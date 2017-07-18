@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.subjects.management') . ' | ' . trans('labels.backend.subjects.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.subjects.management') }}
        <small>{{ trans('labels.backend.subjects.edit') }}</small>
    </h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {{ Form::model($subject, ['route' => ['admin.subjects.update', $subject], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'put']) }}

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('labels.backend.subjects.edit') }}</h3>

                    <div class="box-tools pull-right">
                    </div><!--box-tools pull-right-->
                </div><!-- /.box-header -->

                <div class="box-body">
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

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <div class="pull-left">
                                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success']) }}
                            </div><!--pull-left-->

                            <div class="pull-right">
                                {{ link_to_route('admin.subjects.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger']) }}
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
