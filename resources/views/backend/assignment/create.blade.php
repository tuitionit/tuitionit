@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.assignments.management') . ' | ' . trans('labels.backend.assignments.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.assignments.create') }}
    </h1>
@stop

@section('page-header')
    <h1>
        {{ trans('labels.backend.assignments.create') }}
    </h1>
@stop

@section('content')
    @include('backend.assignment._form')
@stop
