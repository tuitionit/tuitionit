@extends ('backend.layouts.app')

@section ('title', $institute->name)

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ $institute->name }}
        <small>[{{ $institute->code }}]</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.institute.overview') }}</h3>

            <div class="box-tools pull-right">
                <div class="pull-right mb-10">
                    @can('update', $institute)
                    <a href="{{ route('admin.institute.edit')}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil"></i>
                        {{ trans('buttons.general.crud.edit') }}
                    </a>
                    @endcan
                </div><!--pull right-->
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="row">
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('labels.backend.institute.locations') }}</h3>

                    <div class="box-tools pull-right">
                        <div class="pull-right mb-10">
                            <a href="{{ route('admin.locations.create') }}" class="btn btn-sm btn-success">
                                <i class="fa fa-plus"></i>
                                {{ trans('labels.backend.locations.create') }}
                            </a>
                        </div><!--pull right-->
                    </div><!--box-tools pull-right-->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <ul class="nav nav-pills nav-stacked full-width">
                        @forelse($locations as $location)
                        <li>
                            <a href="{{ route('admin.locations.show', $location) }}">
                                <i class="fa fa-map-marker"></i>
                                <span>{{ $location->name }}</span>
                                <span class="pull-right text-muted small">
                                    <i class="fa fa-phone"></i>
                                    {{ $location->phone }}
                                </span>
                            </a>
                        </li>
                        @empty
                            <div class="text-center">
                                <p>
                                    {{ trans('strings.backend.locations.empty') }}
                                </p>
                                <a href="{{ route('admin.locations.create') }}" class="btn btn-default">
                                    <i class="fa fa-plus"></i>
                                    {{ trans('labels.backend.locations.create') }}
                                </a>
                            </div>
                        @endforelse
                    </ul>
                </div><!-- /.box-body -->
            </div><!--box-->
        </div>
    </div>
@stop
