@extends ('backend.layouts.app')

@section ('title', $location->name)

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ $location->institute->name }}
        <small>{{ $location->name }}</small>
    </h1>
@endsection

@section('content')
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

        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="row">
        <div class="col-sm-6">
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
                    <ul class="nav nav-pills nav-stacked full-width">
                        @forelse($location->rooms as $room)
                        <li>
                            <a href="{{ route('admin.rooms.edit', $location) }}">
                                <i class="fa fa-map-marker"></i>
                                <span>{{ $location->name }}</span>
                                <span class="pull-right text-muted small">{{ $location->phone }}</span>
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
    </div>
@stop
