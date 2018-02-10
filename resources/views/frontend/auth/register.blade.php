@extends('frontend.layouts.app')

@section ('body-class', 'with-bg')

@section('content')
    <div class="uk-container uk-container-small">
        <div class="uk-card form-container">
            <div class="register uk-card-body">
                <div class="institute-logo">
                    <img src="{{ asset('/img/logo.png') }}" alt="logo" />
                </div>

                <h3 class="uk-card-title">{{ trans('labels.frontend.auth.register_box_title') }}</h3>

                <div class="panel-body">
                    {{ Form::open(['route' => 'frontend.auth.register', 'class' => 'form-horizontal']) }}

                    <div class="uk-margin">
                        {{ Form::input('name', 'name', null, ['class' => 'uk-input', 'placeholder' => trans('validation.attributes.frontend.name')]) }}
                    </div><!--uk-margin-->

                    <div class="uk-margin">
                        {{ Form::input('email', 'email', null, ['class' => 'uk-input', 'placeholder' => trans('validation.attributes.frontend.email')]) }}
                    </div><!--uk-margin-->

                    <div class="uk-margin">
                        {{ Form::input('password', 'password', null, ['class' => 'uk-input', 'placeholder' => trans('validation.attributes.frontend.password')]) }}
                    </div><!--uk-margin-->

                    <div class="uk-margin">
                        {{ Form::input('password', 'password_confirmation', null, ['class' => 'uk-input', 'placeholder' => trans('validation.attributes.frontend.password_confirmation')]) }}
                    </div><!--uk-margin-->

                    @if (config('access.captcha.registration'))
                        <div class="uk-margin">
                            <div class="">
                                {!! Form::captcha() !!}
                                {{ Form::hidden('captcha_status', 'true') }}
                            </div><!--col-md-6-->
                        </div><!--uk-margin-->
                    @endif

                    <div class="uk-margin">
                        {{ Form::submit(trans('labels.frontend.auth.register_button'), ['class' => 'uk-button uk-button-primary uk-width-1-1']) }}
                    </div><!--uk-margin-->

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
@endsection
