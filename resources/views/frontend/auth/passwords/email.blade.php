@extends('frontend.layouts.app')

@section ('body-class', 'with-bg')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="uk-container uk-container-small">
    <div class="uk-card form-container">
        <div class="rest-password uk-card-body">
                <div class="institute-logo">
                    <img src="{{ asset('/img/logo.png') }}" alt="logo" />
                </div>

                <h3 class="uk-card-title">{{ trans('labels.frontend.passwords.reset_password_box_title') }}</h3>

                <div class="panel-body">
                    {{ Form::open(['route' => 'frontend.auth.password.email', 'class' => 'form-horizontal']) }}

                    <div class="uk-margin">
                        {{ Form::input('email', 'email', null, ['class' => 'uk-input', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
                    </div><!--uk-margin-->

                    <div class="uk-margin">
                        {{ Form::submit(trans('labels.frontend.passwords.send_password_reset_link_button'), ['class' => 'uk-button uk-button-primary']) }}
                    </div><!--uk-margin-->

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
