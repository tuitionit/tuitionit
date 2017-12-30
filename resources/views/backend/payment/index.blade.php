@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.payments.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/datatables.css") }}
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.payments.management') }}
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.payments.all') }}</h3>

            <div class="box-tools pull-right">
                <div class="pull-right mb-10 hidden-sm hidden-xs">
                    {{ link_to_route('admin.payments.create', trans('menus.backend.payments.create'), [], ['class' => 'btn btn-success btn-sm']) }}
                    {{-- <a href="#filters-modal" class="btn btn-sm btn-default" data-toggle="modal"><i class="fa fa-filter"></i></a> --}}
                </div><!--pull right-->
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            {!! $dataTable->table() !!}
        </div><!-- /.box-body -->
    </div><!--box-->

    <div id="filters-modal" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('labels.backend.table.filters') }}</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <button type="button" id="#filter" class="btn btn-success">{{ trans('buttons.general.apply_filters') }}</button>
                        <button type="button" id="#clear-filters" class="btn btn-default">{{ trans('buttons.general.clear_filters') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/datatables.js") }}
    {{ Html::script("/vendor/datatables/buttons.server-side.js") }}

    {!! $dataTable->scripts() !!}
@stop
