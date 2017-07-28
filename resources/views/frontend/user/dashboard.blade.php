@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-5 col-md-4">
            <div class="panel panel-primary panel-user">
                <div class="panel-heading">
                    <h4 class="panel-title">{{ $logged_in_user->name }}</h4>
                </div>
                <div class="panel-body">
                    <div class="panel-user-image">
                        <img class="img-responsive img-circle" src="{{ $logged_in_user->picture }}" alt="Profile picture">
                    </div>

                    <div class="panel-user-details">
                        <div class="text-center text-muted">
                            <small>
                                {{ $logged_in_user->email }}<br/>
                                Joined {{ $logged_in_user->created_at->format('F jS, Y') }}<br/><br/>
                            </small>
                        </div>
                        <div class="text-center">
                            {{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => 'btn btn-primary btn-sm']) }}

                            @permission('view-backend')
                                {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-sm']) }}
                            @endauth
                        </div>

                        <div class="warning-emblem">
                            <i class="fa fa-exclamation"></i>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge badge-warning">34</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-dollar"></i>
                            <span class="badge badge-danger">124</span>
                        </div>
                        <div class="col-xs-4 text-center">
                            <i class="fa fa-calendar-o"></i>
                            <span class="badge badge-danger">23</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-7 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">My Sessions</h4>
                </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div><!-- row -->
@endsection
