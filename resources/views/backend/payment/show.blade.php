@extends ('backend.layouts.app')

@section ('title', $batch->name)

@section('after-styles')
    {{ Html::style("css/backend/plugin/select2/select2.min.css") }}
    {{ Html::style("css/backend/plugin/select2/select2-bootstrap.min.css") }}
@stop

@section('page-header')
    <h1>
        {{ $batch->name }}
        <small>{{ $batch->name }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.batch.overview') }}</h3>

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
                    <h3 class="box-title">{{ trans('labels.backend.batch.students') }}</h3>

                    <div class="box-tools pull-right">
                        <div class="pull-right mb-10">
                            <a href="#add-students-modal" data-toggle="modal" data-target="#add-students-modal" class="btn btn-sm btn-primary">{{ trans('buttons.backend.batch.add_students') }}</a>
                            {{ link_to_route('admin.students.create', trans('buttons.backend.batch.new_student'), ['batch' => $batch->id], ['class' => 'btn btn-success btn-sm']) }}
                        </div><!--pull right-->
                    </div><!--box-tools pull-right-->
                </div><!-- /.box-header -->

                <div class="box-body">
                    <div id="students">
                        <div class="row form-group">
                            <div class="col-xs-6 col-sm-8">
                                <input type="text" class="form-control input-sm search" placeholder="{{ trans('strings.backend.general.search_placeholder') }}" >
                            </div>
                            <div class="col-xs-6 col-sm-4">
                                <button type="button" class="btn btn-sm btn-default btn-block sort" data-sort="name">
                                    <i class="fa fa-sort-alpha-asc asc"></i>
                                    <i class="fa fa-sort-alpha-desc desc"></i>
                                    {{ trans('buttons.backend.batch.students.sort.name') }}
                                </button>
                            </div>
                        </div>

                        <ul class="nav nav-stacked list">
                            @foreach($batch->students as $student)
                            <li>
                                <a href="{{ route('admin.students.show', ['id' => $student->id]) }}"><i class="fa fa-user"></i> {{ $student->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- /.box-body -->
            </div><!--box-->
        </div>
    </div>

    <div class="modal fade" id="add-students-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{ trans('labels.backend.batch.add_students') }}</h4>
                </div>

                <div class="modal-body">
                    <div class="">
                        {{ Form::open(['route' => ['admin.batches.students.add', 'id' => $batch->id], 'id' => 'add-students-form','class' => 'form', 'role' => 'form', 'method' => 'post']) }}
                        <div class="form-group">
                            <p class="help-block small text-muted">{{ trans('strings.backend.batches.select_students') }}</p>
                            <select id="student-selector" class="form-control" placeholder="{{ trans('strings.backend.search.type') }}" name="students[]"></select>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="add-students" class="btn btn-primary">{{ trans('buttons.backend.batch.add_selected_students') }}</button>
                    <button type="button" data-dismiss="modal" data-target="#add-students-modal" class="btn btn-default">{{ trans('buttons.general.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('after-scripts')
    {{ Html::script("js/backend/plugin/select2/select2.full.min.js") }}
    {{ Html::script("js/plugins/list.js/list.min.js") }}

    <script>
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
        $('#add-students').prop('disabled', true);

        $(document).ready(function() {
            $('#student-selector').select2({
                theme: 'bootstrap',
                multiple: true,
                ajax: {
                    url: "{{ route('admin.students.list') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            name: params.term,
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        return {
                            results: data
                        };
                    },
                },
                width: '100%'
            });

            $('#student-selector').on('change', function(evt) {
                var val = $(this).val();
                $('#add-students').prop('disabled', val.length == 0);
            });

            $('#add-students').on('click', function() {
                $('#add-students-form').submit();
            });

            var studentsList = new List('students', {
                valueNames: ['name']
            });
        });
    </script>
@endsection
