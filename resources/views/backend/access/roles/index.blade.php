@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/datatables.css") }}
@endsection

@section('page-header')
    <h1>{{ trans('labels.backend.access.roles.management') }}</h1>
@endsection

@section('content')
    {!! $dataTable->table() !!}
@stop

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/datatables.js") }}
    {{ Html::script("/vendor/datatables/buttons.server-side.js") }}

    {!! $dataTable->scripts() !!}
@stop
