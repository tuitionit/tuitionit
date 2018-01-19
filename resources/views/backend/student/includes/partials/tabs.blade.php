<ul class="nav nav-tabs">
    <li class="{{ $tab == 'profile' ? 'active' : '' }}">
        <a href="#timeline" data-toggle="tab"><i class="fa fa-calendar"></i> {{ trans('labels.backend.student.timeline')}}</a>
    </li>
    <li class="{{ $tab == 'sessions' ? 'active' : '' }}">
        <a href="#sessions" data-toggle="tab"><i class="fa fa-clock-o"></i> {{ trans('labels.backend.student.sessions')}}</a>
    </li>
    <li class="{{ $tab == 'reports' ? 'active' : '' }}">
        <a href="#reports" data-toggle="tab"><i class="fa fa-clone"></i> {{ trans('labels.backend.student.reports')}}</a>
    </li>
    <li class="{{ $tab == 'batches' ? 'active' : '' }}">
        <a href="#batches" data-toggle="tab"><i class="fa fa-users"></i> {{ trans('labels.backend.student.batches')}}</a>
    </li>
    <li class="{{ $tab == 'payments' ? 'active' : '' }}">
        <a href="#payments" data-toggle="tab"><i class="fa fa-money"></i> {{ trans('labels.backend.student.payments')}}</a>
    </li>
    <li class="{{ $tab == 'settings' ? 'active' : '' }}">
        <a href="#settings" data-toggle="tab"><i class="fa fa-gears"></i> {{ trans('labels.backend.student.settings')}}</a>
    </li>
</ul>
