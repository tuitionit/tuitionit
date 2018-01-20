@extends('frontend.layouts.app')

@section('after-styles')
    <style media="screen">
        body {
            background-color: #2B3F52;
        }

        .tu-navbar-container {
            background: transparent !important;
        }
        
        .uk-navbar-item.uk-logo {
            color: #AAA;
        }

        .uk-navbar-item.uk-logo:hover {
            color: #FFF;
        }

        .institute-logo {
            padding: 40px 0;
        }
        .institute-logo img {
            display: block;
            margin: 0 auto;
            width: 120px;
        }

        .login-container {
            background: white url('img/login-bg.jpg') no-repeat 50% 85%;
            border-radius: 6px;
            overflow: hidden;
            margin: 60px auto 40px;
            max-width: 360px;
        }

        .login-container .login {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px 40px;
        }
    </style>
@stop

@section('content')
    <div class="uk-container uk-container-small">
        <div class="uk-card login-container">
            <div class="login">
                <div class="institute-logo">
                    <img src="{{ asset('/img/logo.png') }}" alt="logo" />
                </div>
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
                        {!! $socialite_links !!}
                    </div>
                </div>
            </div>
        </div><!-- col-md-8 -->
    </div><!-- row -->
@endsection
