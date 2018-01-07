@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($user, ['route' => ['admin.access.user.update', $user], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH']) }}
    <div class="box box-warning box-form">
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

                        @if ($user->id != 1)
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <div class="checkbox">
                                        <label>
                                            {{ Form::checkbox('status', '1', $user->status == 1) }}
                                            {{ trans('validation.attributes.backend.access.users.active') }}
                                        </label>
                                    </div>
                                </div>
                            </div><!--form control-->

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <div class="checkbox">
                                        <label>
                                            {{ Form::checkbox('confirmed', '1', $user->confirmed == 1) }}
                                            {{ trans('validation.attributes.backend.access.users.confirmed') }}
                                        </label>
                                    </div>
                                </div>
                            </div><!--form control-->
                        @endif
                    </div>

                    <div class="col-md-6">
                        @if ($user->id != 1)
                            <div class="form-group">
                                {{ Form::label('status', trans('validation.attributes.backend.access.users.associated_roles'), ['class' => 'col-lg-4 control-label']) }}

                                <div class="col-lg-8">
                                    @if (count($roles) > 0)
                                        @foreach($roles as $role)
                                            <input type="checkbox" value="{{$role->id}}" name="assignees_roles[{{ $role->id }}]" {{ is_array(old('assignees_roles')) ? (in_array($role->id, old('assignees_roles')) ? 'checked' : '') : (in_array($role->id, $user_roles) ? 'checked' : '') }} id="role-{{$role->id}}" /> <label for="role-{{$role->id}}">{{ $role->name }}</label>
                                                <a href="#" data-role="role_{{$role->id}}" class="show-permissions small">
                                                    (
                                                        <span class="show-text">{{ trans('labels.general.show') }}</span>
                                                        <span class="hide-text hidden">{{ trans('labels.general.hide') }}</span>
                                                        {{ trans('labels.backend.access.users.permissions') }}
                                                    )
                                                </a>
                                            <br/>
                                            <div class="permission-list hidden" data-role="role_{{$role->id}}">
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
                        @endif
                    </div>
                </div><!-- /.row -->
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
                            {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-warning btn-block']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.box-footer -->
    </div><!--box-->

    @if ($user->id == 1)
        {{ Form::hidden('status', 1) }}
        {{ Form::hidden('confirmed', 1) }}
        {{ Form::hidden('assignees_roles[]', 1) }}
    @endif

    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
@endsection
