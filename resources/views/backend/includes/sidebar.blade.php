<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Image" />
            </div><!--pull-left-->
            <div class="pull-left info">
                <p>{{ access()->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div><!--pull-left-->
        </div><!--user-panel-->

        <?php /*
        <!-- search form (Optional) -->
        {{ Form::open(['route' => 'admin.search.index', 'method' => 'get', 'class' => 'sidebar-form']) }}
        <div class="input-group">
            {{ Form::text('q', Request::get('q'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('strings.backend.general.search_placeholder')]) }}

            <span class="input-group-btn">
                <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span><!--input-group-btn-->
        </div><!--input-group-->
        {{ Form::close() }}
        <!-- /.search form -->
        */ ?>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <li class="{{ active_class(Active::checkUriPattern('admin/dashboard')) }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-bar-chart"></i>
                    <span>{{ trans('menus.backend.sidebar.dashboard') }}</span>
                </a>
            </li>

            @permission('manage-students')
            <li class="{{ active_class(Active::checkUriPattern('admin/students*')) }}">
                <a href="{{ route('admin.students.index') }}">
                    <i class="fa fa-user-o"></i>
                    <span>{{ trans('menus.backend.sidebar.students') }}</span>
                </a>
            </li>
            @endauth

            @permission('manage-sessions')
            <li class="{{ active_class(Active::checkUriPattern('admin/sessions')) }}">
                <a href="{{ route('admin.sessions.index') }}">
                    <i class="fa fa-clock-o"></i>
                    <span>{{ trans('menus.backend.sidebar.sessions') }}</span>
                </a>
            </li>
            @endauth

            @permission('manage-attendances')
            <li class="{{ active_class(Active::checkUriPattern('admin/attendances*')) }}">
                <a href="{{ route('admin.attendances.index') }}">
                    <i class="fa fa-check-circle-o"></i>
                    <span>{{ trans('menus.backend.sidebar.attendance') }}</span>
                </a>
            </li>
            @endauth

            @permission('manage-payments')
            <li class="{{ active_class(Active::checkUriPattern('admin/payments*')) }}">
                <a href="{{ route('admin.payments.index') }}">
                    <i class="fa fa-usd"></i>
                    <span>{{ trans('menus.backend.sidebar.payments') }}</span>
                </a>
            </li>
            @endauth

            @permission('manage-batches')
            <li class="{{ active_class(Active::checkUriPattern('admin/batches')) }}">
                <a href="{{ route('admin.batches.index') }}">
                    <i class="fa fa-users"></i>
                    <span>{{ trans('menus.backend.sidebar.batches') }}</span>
                </a>
            </li>
            @endauth

            @permission('manage-courses')
            <li class="{{ active_class(Active::checkUriPattern('admin/courses')) }}">
                <a href="{{ route('admin.courses.index') }}">
                    <i class="fa fa-clone"></i>
                    <span>{{ trans('menus.backend.sidebar.courses') }}</span>
                </a>
            </li>
            @endauth

            @permission('manage-teachers')
            <li class="{{ active_class(Active::checkUriPattern('admin/teachers')) }}">
                <a href="{{ route('admin.teachers.index') }}">
                    <i class="fa fa-graduation-cap"></i>
                    <span>{{ trans('menus.backend.sidebar.teachers') }}</span>
                </a>
            </li>
            @endauth

            <?php /*
            <li class="{{ active_class(Active::checkUriPattern('admin/subjects')) }}">
                <a href="{{ route('admin.subjects.index') }}">
                    <i class="fa fa-flask"></i>
                    <span>{{ trans('menus.backend.sidebar.subjects') }}</span>
                </a>
            </li>
            */ ?>


            <li class="header">{{ trans('menus.backend.sidebar.system') }}</li>

            @role(2)
            <li class="{{ active_class(Active::checkUriPattern('admin/institute')) }} treeview">
                <a href="{{ route('admin.institute') }}">
                    <i class="fa fa-institution"></i>
                    <span>{{ trans('menus.backend.institute.management') }}</span>
                </a>
            </li>
            @endauth

            @role(2)
            <li class="{{ active_class(Active::checkUriPattern('admin/access/*')) }} treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>{{ trans('menus.backend.access.title') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/access/*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/access/*'), 'display: block;') }}">
                    @permission('manage-users')
                    <li class="{{ active_class(Active::checkUriPattern('admin/access/user*')) }}">
                        <a href="{{ route('admin.access.user.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('labels.backend.access.users.management') }}</span>
                        </a>
                    </li>
                    @endauth

                    <li class="{{ active_class(Active::checkUriPattern('admin/access/role*')) }}">
                        <a href="{{ route('admin.access.role.index') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('labels.backend.access.roles.management') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endauth

            @role(1)
            <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer*')) }} treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'menu-open') }}" style="display: none; {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'display: block;') }}">
                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer')) }}">
                        <a href="{{ route('log-viewer::dashboard') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.dashboard') }}</span>
                        </a>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('admin/log-viewer/logs')) }}">
                        <a href="{{ route('log-viewer::logs.list') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.logs') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endauth

        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>
