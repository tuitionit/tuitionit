@extends('frontend.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3>{{ $logged_in_user->name }}</h3>
        <p class="text-muted">{{ $logged_in_user->type }}</p>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-md-offset-2">

        <div class="user">
            <div class="avatar">
                <div class="image-editor">
                    <div class="cropit-preview"></div>
                </div>
            </div>
            <div class="details"></div>
        </div>
    </div>
    <div class="col-md-5">
        <div role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active">
                    <a href="#edit" aria-controls="edit" role="tab" data-toggle="tab">{{ trans('labels.frontend.user.profile.update_information') }}</a>
                </li>

                @if ($logged_in_user->canChangePassword())
                    <li role="presentation">
                        <a href="#password" aria-controls="password" role="tab" data-toggle="tab">{{ trans('navs.frontend.user.change_password') }}</a>
                    </li>
                @endif
            </ul>

            <div class="tab-content">

                <div role="tabpanel" class="tab-pane mt-30 active" id="edit">
                    @include('frontend.user.account.tabs.edit')
                </div><!--tab panel profile-->

                @if ($logged_in_user->canChangePassword())
                    <div role="tabpanel" class="tab-pane mt-30" id="password">
                        @include('frontend.user.account.tabs.change-password')
                    </div><!--tab panel change password-->
                @endif

            </div><!--tab content-->

        </div><!--tab panel-->
    </div>
</div>
@endsection

@section('after-scripts')
    {{ Html::script("js/plugins/cropit/jquery.cropit.js") }}
@endsection
