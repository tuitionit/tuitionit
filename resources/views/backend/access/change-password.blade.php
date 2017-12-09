@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.change_password'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.change_password') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => ['admin.access.user.change-password', $user], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'patch']) }}

    <div class="col-lg-6 col-lg-offset-3">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.access.users.change_password_for', ['user' => $user->name]) }}</h3>

                <div class="box-tools pull-right">
                    </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('password', trans('validation.attributes.backend.access.users.password'), ['class' => 'col-md-4 control-label', 'placeholder' => trans('validation.attributes.backend.access.users.password')]) }}

                    <div class="col-md-8">
                        {{ Form::password('password', ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('password_confirmation', trans('validation.attributes.backend.access.users.password_confirmation'), ['class' => 'col-md-4 control-label', 'placeholder' => trans('validation.attributes.backend.access.users.password_confirmation')]) }}

                    <div class="col-md-8">
                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->

            <div class="box-footer">
                <div class="row">
                    <div class="col-lg-11 col-lg-offset-1">
                        <div class="row">
                            <div class="col-xs-6 col-md-2 col-md-offset-6">
                                {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-default btn-block']) }}
                            </div>
                            <div class="col-xs-6 col-md-4">
                                {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-success btn-block']) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-footer -->
        </div><!--box-->
    </div>

    {{ Form::close() }}
@endsection
