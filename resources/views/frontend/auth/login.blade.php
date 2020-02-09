@extends('frontend.layouts.app')

@section ('body-class', 'with-bg')

@section('after-styles')
    <style media="screen">
    </style>
@stop

@section('content')
    <div class="uk-container uk-container-small">
        <div class="uk-card form-container">
            <div class="login uk-card-body">
                <div class="institute-logo">
                    <img src="{{ asset('/img/logo.png') }}" alt="logo" />
                </div>

                <h3 class="uk-card-title">{{ trans('labels.frontend.auth.login_box_title') }}</h3>

                <div class="system-login">
                    {{ Form::open(['route' => 'frontend.auth.login', 'class' => 'form-horizontal']) }}

                    <div class="uk-margin">
                        {{ Form::input('email', 'email', null, ['class' => 'uk-input', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
                    </div>

                    <div class="uk-margin">
                        {{ Form::input('password', 'password', null, ['class' => 'uk-input', 'placeholder' => trans('validation.attributes.frontend.password')]) }}
                    </div>

                    <div class="uk-margin">
                        <label>
                            {{ Form::checkbox('remember', 1, false, ['class' => 'uk-checkbox']) }} {{ trans('labels.frontend.auth.remember_me') }}
                        </label>
                    </div>

                    <div class="uk-margin">
                        {{ Form::submit(trans('labels.frontend.auth.login_button'), ['class' => 'uk-button uk-button-primary uk-width-1-1']) }}
                    </div>

                    <div class="uk-margin-large-top">
                        {{ link_to_route('frontend.auth.password.reset', trans('labels.frontend.passwords.forgot_password'), [], ['class' => 'uk-text-center uk-align-center uk-text-small']) }}
                    </div>

                    {{ Form::close() }}

                    <div class="row text-center">
                        {!! $socialiteLinks !!}
                    </div>
                </div>
            </div>
        </div><!-- col-md-8 -->
    </div><!-- row -->
@endsection
