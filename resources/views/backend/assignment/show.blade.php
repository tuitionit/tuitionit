@extends ('backend.layouts.app')

@section ('title', $assignment->name)

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/dataTables.bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ $assignment->name }}
        <small>{{ $assignment->name }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.assignment.overview') }}</h3>

            <div class="box-tools pull-right">
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">

        </div><!-- /.box-body -->
    </div><!--box-->

    <div class="row">
        <div class="col-sm-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('labels.backend.assignment.locations') }}</h3>

                    <div class="box-tools pull-right">
                        <div class="pull-right mb-10">
                            {{ link_to_route('admin.assignments.index', trans('menus.backend.assignments.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
                            {{ link_to_route('admin.locations.create', trans('menus.backend.assignments.create'), [], ['class' => 'btn btn-success btn-xs']) }}
                        </div><!--pull right-->
                    </div><!--box-tools pull-right-->
                </div><!-- /.box-header -->

                <div class="box-body">

                </div><!-- /.box-body -->
            </div><!--box-->
        </div>
    </div>
@stop
