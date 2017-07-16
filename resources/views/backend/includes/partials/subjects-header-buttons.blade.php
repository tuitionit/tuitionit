<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.subjects.index', trans('menus.backend.subjects.all'), [], ['class' => 'btn btn-primary btn-sm']) }}
    {{ link_to_route('admin.subjects.create', trans('menus.backend.subjects.create'), [], ['class' => 'btn btn-success btn-sm']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.subjects.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.subjects.index', trans('menus.backend.subjects.all')) }}</li>
            <li>{{ link_to_route('admin.subjects.create', trans('menus.backend.subjects.create')) }}</li>
            <li class="divider"></li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
