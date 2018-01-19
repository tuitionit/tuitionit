@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.deactivated'))

@section('after-styles')
    {{ Html::style("css/backend/plugin/datatables/datatables.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.deactivated') }}</small>
    </h1>
@endsection

@section('content')
    <div class="">
        @include('backend.access.includes.partials.user-header-buttons')
    </div>

    {!! $dataTable->table() !!}
@endsection

@section('after-scripts')
    {{ Html::script("js/backend/plugin/datatables/datatables.js") }}
    {{ Html::script("/vendor/datatables/buttons.server-side.js") }}

    {!! $dataTable->scripts() !!}
@stop
