@extends ('backend.layouts.app')

@section ('title', $institute->name)

@section('after-styles')
@stop

@section('page-header')
    <h1>
        {{ $institute->name }}
        <small>[{{ $institute->code }}]</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-lg-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('labels.backend.institute.settings') }}</h3>

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
        </div>
        <div class="col-md-4 col-lg-6">
            <div class="row">
                <div class="col-lg-6">
                    <div class="box box-default">
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

                        <div class="box-body no-lr-padding">
                            <ul class="nav nav-pills nav-stacked full-width">
                                @forelse($locations as $location)
                                <li>
                                    <a href="{{ route('admin.locations.show', $location) }}">
                                        <i class="fa fa-map-marker"></i>
                                        <span>{{ $location->name }}</span>
                                        @if($location->phone)
                                        <span class="pull-right text-muted small">
                                            <i class="fa fa-phone"></i>
                                            {{ $location->phone }}
                                        </span>
                                        @endif
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
                <div class="col-lg-6">
                    @permission('manage-subjects')
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">{{ trans('labels.backend.institute.subjects') }}</h3>

                            <div class="box-tools pull-right">
                                <div class="pull-right mb-10">
                                    <a href="{{ route('admin.subjects.create') }}" class="btn btn-sm btn-success">
                                        <i class="fa fa-plus"></i>
                                        {{ trans('labels.backend.subjects.create') }}
                                    </a>
                                </div><!--pull right-->
                            </div><!--box-tools pull-right-->
                        </div><!-- /.box-header -->

                        <div class="box-body no-lr-padding">
                            <ul class="nav nav-pills nav-stacked full-width">
                                @forelse($subjects as $subject)
                                <li>
                                    <a href="{{ route('admin.subjects.edit', $subject) }}">
                                        <i class="fa fa-book"></i>
                                        <span>{{ $subject->name }}</span>
                                        <span class="pull-right text-muted small">
                                            {!! $subject->status_label !!}
                                        </span>
                                    </a>
                                </li>
                                @empty
                                    <div class="text-center">
                                        <p>
                                            {{ trans('strings.backend.subjects.empty') }}
                                        </p>
                                        <a href="{{ route('admin.subjects.create') }}" class="btn btn-default">
                                            <i class="fa fa-plus"></i>
                                            {{ trans('labels.backend.subjects.create') }}
                                        </a>
                                    </div>
                                @endforelse
                            </ul>
                        </div><!-- /.box-body -->
                    </div><!--box-->
                    @endauth
                </div>
            </div>
        </div>
    </div>
@stop
