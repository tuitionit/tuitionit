<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('widgets.backend.quick_links.title') }}</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div><!--box-tools pull-right-->
    </div><!-- /.box-header -->

    <div class="box-body">
        <div class="list-group">
            <a href="{{ route('admin.attendances.mark') }}" class="list-group-item">
                <i class="fa fa-check-circle-o"></i>
                {{ trans('buttons.backend.attendance.mark_attendance') }}
            </a>
        </div>
    </div>
</div>
