@extends ('backend.layouts.app')

@section ('title', $student->name)

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ $student->name }}
        <small>{{ $student->name }}</small>
    </h1>
@endsection

@section('content')
<div class="row">
    <div class="col-sm-4 col-md-3">
        <div class="box box-primary">
            <div class="box-body">
                <img src="{{ URL::to('/') }}/img/student.png" class="profile-user-img img-responsive img-circle" />
                <h3 class="profile-username text-center">{{ $student->name }}</h3>
            </div><!-- /.box-body -->
        </div><!--box-->
    </div>
    <div class="col-sm-8 col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#sessions"><i class="fa fa-clock-o"></i> {{ trans('labels.backend.student.sessions')}}</a>
                </li>
                <li class="">
                    <a href="#batches"><i class="fa fa-users"></i> {{ trans('labels.backend.student.batches')}}</a>
                </li>
                <li class="">
                    <a href="#payments"><i class="fa fa-money"></i> {{ trans('labels.backend.student.payments')}}</a>
                </li>
                <li class="">
                    <a href="#settings"><i class="fa fa-gears"></i> {{ trans('labels.backend.student.settings')}}</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="sessions">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>{{ trans('labels.backend.student.upcoming_sessions')}}</h3>
                        </div>
                        <div class="col-md-6">
                            <h3>{{ trans('labels.backend.student.past_sessions')}}</h3>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="batches">

                </div>
                <div class="tab-pane" id="payments">

                </div>
                <div class="tab-pane" id="settings">

                </div>
            </div>
        </div>
    </div>
</div>
@stop
