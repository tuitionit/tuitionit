<div class="pull-right mb-10 hidden-sm hidden-xs">
    {{ link_to_route('admin.students.index', trans('menus.backend.students.all'), [], ['class' => 'btn btn-primary btn-xs']) }}
    {{ link_to_route('admin.students.create', trans('menus.backend.students.create'), [], ['class' => 'btn btn-success btn-xs']) }}
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.students.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li>{{ link_to_route('admin.students.index', trans('menus.backend.students.all')) }}</li>
            <li>{{ link_to_route('admin.students.create', trans('menus.backend.students.create')) }}</li>
            <li class="divider"></li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>
