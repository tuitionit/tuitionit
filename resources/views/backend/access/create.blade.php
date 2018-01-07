@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.create') }}
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.access.user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}
    <div class="box box-success box-form">
        <div class="box-header">
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', trans('validation.attributes.backend.access.users.name'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.name')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.email')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('password', trans('validation.attributes.backend.access.users.password'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.password')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            {{ Form::label('password_confirmation', trans('validation.attributes.backend.access.users.password_confirmation'), ['class' => 'col-lg-2 control-label']) }}

                            <div class="col-lg-10">
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.password_confirmation')]) }}
                            </div><!--col-lg-10-->
                        </div><!--form control-->

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('status', '1', true) }}
                                        {{ trans('validation.attributes.backend.access.users.active') }}
                                    </label>
                                </div>
                            </div>
                        </div><!--form control-->

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('confirmed', '1', true) }}
                                        {{ trans('validation.attributes.backend.access.users.confirmed') }}
                                    </label>
                                </div>
                            </div>
                        </div><!--form control-->

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('confirmation_email', '1') }}
                                        {{ trans('validation.attributes.backend.access.users.send_confirmation_email') }}<br/>
                                        <small>{{ trans('strings.backend.access.users.if_confirmed_off') }}</small>
                                    </label>
                                </div>
                            </div>
                        </div><!--form control-->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('status', trans('validation.attributes.backend.access.users.associated_roles'), ['class' => 'col-lg-4 control-label']) }}

                            <div class="col-lg-8">
                                @if (count($roles) > 0)
                                    @foreach($roles as $role)
                                        <input type="checkbox" value="{{ $role->id }}" name="assignees_roles[{{ $role->id }}]" id="role-{{ $role->id }}" {{ is_array(old('assignees_roles')) && in_array($role->id, old('assignees_roles')) ? 'checked' : '' }} /> <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                        <a href="#" data-role="role_{{ $role->id }}" class="show-permissions small">
                                            (
                                                <span class="show-text">{{ trans('labels.general.show') }}</span>
                                                <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
                                                {{ trans('labels.backend.access.users.permissions') }}
                                            )
                                        </a>
                                        <br/>
                                        <div class="permission-list hidden" data-role="role_{{ $role->id }}">
                                            @if ($role->all)
                                                {{ trans('labels.backend.access.users.all_permissions') }}<br/><br/>
                                            @else
                                                @if (count($role->permissions) > 0)
                                                    <blockquote class="small">{{--
                                                --}}@foreach ($role->permissions as $perm){{--
                                                    --}}{{$perm->display_name}}<br/>
                                                        @endforeach
                                                    </blockquote>
                                                @else
                                                    {{ trans('labels.backend.access.users.no_permissions') }}<br/><br/>
                                                @endif
                                            @endif
                                        </div><!--permission list-->
                                    @endforeach
                                @else
                                    {{ trans('labels.backend.access.users.no_roles') }}
                                @endif
                            </div><!--col-lg-3-->
                        </div><!--form control-->
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="row">
                        <div class="col-xs-6 col-md-2 col-md-offset-6">
                            {{ link_to_route('admin.access.user.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-default btn-block']) }}
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
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
@endsection
