@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.locations.management') . ' | ' . trans('labels.backend.locations.edit'))

@section('page-header')
    <h1>
        {{ $location->name }}
        <small>{{ trans('labels.backend.locations.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::model($location, ['route' => ['admin.locations.update', $location], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'put']) }}
    <div class="box box-warning box-form">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="section-header">{{ trans('labels.backend.locations.general') }}</h4>

                            <div class="form-group {{ $errors->first('code', 'has-error') }}">
                                {{ Form::label('code', trans('validation.attributes.backend.locations.code'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('code', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.code')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group {{ $errors->first('name', 'has-error') }}">
                                {{ Form::label('name', trans('validation.attributes.backend.locations.name'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.name')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group {{ $errors->first('description', 'has-error') }}">
                                {{ Form::label('description', trans('validation.attributes.backend.locations.description'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.description'), 'rows' => '2']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->


                            <div class="form-group">
                                {{ Form::label('status', trans('validation.attributes.backend.locations.active'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-1">
                                    {{ Form::checkbox('status', '1', true) }}
                                </div><!--col-lg-1-->
                            </div><!--form control-->
                        </div>

                        <div class="col-md-6">
                            <h4 class="section-header">{{ trans('labels.backend.locations.contact') }}</h4>

                            <div class="form-group {{ $errors->first('address', 'has-error') }}">
                                {{ Form::label('address', trans('validation.attributes.backend.locations.address'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.address'), 'rows' => '2']) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group {{ $errors->first('city', 'has-error') }}">
                                {{ Form::label('city', trans('validation.attributes.backend.locations.city'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.city')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group {{ $errors->first('state_province', 'has-error') }}">
                                {{ Form::label('state_province', trans('validation.attributes.backend.locations.state_province'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('state_province', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.state_province')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group {{ $errors->first('country', 'has-error') }}">
                                {{ Form::label('country', trans('validation.attributes.backend.locations.country'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.country')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group {{ $errors->first('postal_code', 'has-error') }}">
                                {{ Form::label('postal_code', trans('validation.attributes.backend.locations.postal_code'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('postal_code', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.postal_code')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                {{ Form::label('email', trans('validation.attributes.backend.locations.email'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.email')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group {{ $errors->first('phone', 'has-error') }}">
                                {{ Form::label('phone', trans('validation.attributes.backend.locations.phone'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.phone')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group {{ $errors->first('fax', 'has-error') }}">
                                {{ Form::label('fax', trans('validation.attributes.backend.locations.fax'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('fax', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.fax')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->

                            <div class="form-group {{ $errors->first('web', 'has-error') }}">
                                {{ Form::label('web', trans('validation.attributes.backend.locations.web'), ['class' => 'col-lg-2 control-label']) }}

                                <div class="col-lg-10">
                                    {{ Form::text('web', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.locations.web')]) }}
                                </div><!--col-lg-10-->
                            </div><!--form control-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="row">
                        <div class="col-xs-6 col-md-2 col-md-offset-6">
                            {{ link_to_route('admin.institute', trans('buttons.general.cancel'), [], ['class' => 'btn btn-default btn-block']) }}
                        </div>
                        <div class="col-xs-6 col-md-4">
                            {{ Form::submit(trans('buttons.general.crud.update'), ['class' => 'btn btn-warning btn-block']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.box-footer -->
    </div><!--box-->
    {{ Form::close() }}

    <div class="row">
        <div class="col-md-6 col-md-offset-6 col-lg-4">
            {!! $location->delete_button !!}
        </div>
    </div>
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
@endsection
