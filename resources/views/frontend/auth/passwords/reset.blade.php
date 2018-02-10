@extends('frontend.layouts.app')

@section ('body-class', 'with-bg')

@section('content')
<div class="uk-container uk-container-small">
    <div class="uk-card form-container">
        <div class="rest-password uk-card-body">
                <div class="institute-logo">
                    <img src="{{ asset('/img/logo.png') }}" alt="logo" />
                </div>

                <h3 class="uk-card-title">{{ trans('labels.frontend.passwords.reset_password_box_title') }}</h3>

                <div class="panel-body">
                    {{ Form::open(['route' => 'frontend.auth.password.reset', 'class' => 'form-horizontal']) }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="uk-margin">
                        <div class="uk-text-center">
                            {{ Form::label('email', trans('validation.attributes.frontend.email'), ['class' => 'col-md-4 control-label']) }}
                            <p class="uk-input-static">{{ $email }}</p>
                            {{ Form::input('hidden', 'email', $email, ['class' => 'uk-input', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
                        </div><!--col-md-6-->
                    </div><!--uk-margin-->

                    <div class="uk-margin">
                        {{ Form::input('password', 'password', null, ['class' => 'uk-input', 'placeholder' => trans('validation.attributes.frontend.password')]) }}
                    </div><!--uk-margin-->

                    <div class="uk-margin">
                        {{ Form::input('password', 'password_confirmation', null, ['class' => 'uk-input', 'placeholder' => trans('validation.attributes.frontend.password_confirmation')]) }}
                    </div><!--uk-margin-->

                    <div class="uk-margin">
                        {{ Form::submit(trans('labels.frontend.passwords.reset_password_button'), ['class' => 'uk-button uk-button-primary uk-width-1-1']) }}
                    </div><!--uk-margin-->

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
