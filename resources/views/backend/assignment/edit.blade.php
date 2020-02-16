@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.assignments.management') . ' | ' . trans('labels.backend.assignments.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.assignments.edit') }}
    </h1>
@endsection

@section('content')
    @include('backend.assignment._form')
@stop
