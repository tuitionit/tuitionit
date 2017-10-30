@extends ('backend.layouts.app')

@section ('title', $location->name)

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}

    <style media="screen">
        .rooms .room .properties .icon {
            margin-left: 10px;
        }
    </style>
@stop

@section('page-header')
    <h1>
        <i class="fa fa-map-marker fa-fw"></i>
        {{ $location->name }}
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('labels.backend.locations.overview') }}</h3>

                    <div class="box-tools pull-right">
                        <a href="{{ route('admin.locations.edit', [$location->id])}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i>
                            {{ trans('buttons.general.crud.edit') }}
                        </a>
                    </div><!--box-tools pull-right-->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <p class="description">{{ $location-> description }}</p>

                    <div class="contact-details">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th><i class="fa fa-home fa-fw"></i> {{ trans('validation.attributes.backend.locations.address') }}</th>
                                    <td>{{ $location->address }}</td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-map-marker fa-fw"></i> {{ trans('validation.attributes.backend.locations.city') }}</th>
                                    <td>{{ $location->city }}</td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-map-marker fa-fw"></i> {{ trans('validation.attributes.backend.locations.state_province') }}</th>
                                    <td>{{ $location->state_province }}</td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-map-marker fa-fw"></i> {{ trans('validation.attributes.backend.locations.country') }}</th>
                                    <td>{{ $location->country }}</td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-map-marker fa-fw"></i> {{ trans('validation.attributes.backend.locations.postal_code') }}</th>
                                    <td>{{ $location->postal_code }}</td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-envelope fa-fw"></i> {{ trans('validation.attributes.backend.locations.email') }}</th>
                                    <td>{{ $location->email }}</td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-phone fa-fw"></i> {{ trans('validation.attributes.backend.locations.phone') }}</th>
                                    <td>{{ $location->phone }}</td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-fax fa-fw"></i> {{ trans('validation.attributes.backend.locations.fax') }}</th>
                                    <td>{{ $location->fax }}</td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-globe fa-fw"></i> {{ trans('validation.attributes.backend.locations.web') }}</th>
                                    <td>{{ $location->web }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.box-body -->
            </div><!--box-->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('labels.backend.locations.rooms') }}</h3>

                    <div class="box-tools pull-right">
                        <div class="pull-right mb-10">
                            <a href="{{ route('admin.locations.rooms.new', ['location' => $location->id]) }}" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                {{ trans('labels.backend.rooms.create') }}
                            </a>
                        </div><!--pull right-->
                    </div><!--box-tools pull-right-->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <ul class="nav nav-pills nav-stacked full-width rooms">
                        @forelse($location->rooms as $room)
                        <li class="room">
                            <a href="{{ route('admin.rooms.edit', $room) }}">
                                <i class="fa fa-building-o"></i>
                                <span>{{ $room->name }}</span>
                                <span class="pull-right properties">
                                    <span class="capacity"  title="{{ trans('validation.attributes.backend.rooms.capacity') }}">
                                        <img src="{{ URL::to('/') }}/img/icons/users.svg" class="icon icon-16">
                                        {{ $room->capacity }}
                                    </span>
                                    @if($room->has_sound)
                                        <img src="{{ URL::to('/') }}/img/icons/sound.svg" class="icon icon-16" title="{{ trans('validation.attributes.backend.rooms.has_sound') }}">
                                    @endif
                                    @if($room->has_blackboard)
                                        <img src="{{ URL::to('/') }}/img/icons/blackboard.svg" class="icon icon-16" title="{{ trans('validation.attributes.backend.rooms.has_blackboard') }}">
                                    @endif
                                    @if($room->has_whiteboard)
                                        <img src="{{ URL::to('/') }}/img/icons/whiteboard.svg" class="icon icon-16" title="{{ trans('validation.attributes.backend.rooms.has_whiteboard') }}">
                                    @endif
                                    @if($room->has_projector)
                                        <img src="{{ URL::to('/') }}/img/icons/projector.svg" class="icon icon-16" title="{{ trans('validation.attributes.backend.rooms.has_projector') }}">
                                    @endif
                                    @if($room->is_airconditioned)
                                        <img src="{{ URL::to('/') }}/img/icons/ac.svg" class="icon icon-16" title="{{ trans('validation.attributes.backend.rooms.is_airconditioned') }}">
                                    @endif
                                </span>
                            </a>
                        </li>
                        @empty
                            <div class="text-center">
                                <p>
                                    {{ trans('strings.backend.rooms.empty') }}
                                </p>
                                <a href="{{ route('admin.locations.rooms.new', ['location' => $location->id]) }}" class="btn btn-default">
                                    <i class="fa fa-plus"></i>
                                    {{ trans('labels.backend.rooms.create') }}
                                </a>
                            </div>
                        @endforelse
                    </ul>
                </div><!-- /.box-body -->
            </div><!--box-->
        </div>
        <div class="col-sm-6 col-md-8">

        </div>
    </div>
@stop
