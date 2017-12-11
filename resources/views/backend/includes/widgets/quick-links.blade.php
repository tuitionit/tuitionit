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
        @foreach($links as $link)
            <a href="{{ route($link['route']) }}">{{ $link['name'] }}</a>
        @endforeach
    </div>
</div>
