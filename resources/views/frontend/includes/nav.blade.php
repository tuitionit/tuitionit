<div class="uk-navbar-container tu-navbar-container uk-sticky uk-sticky-fixed uk-active uk-sticky-below" >
    <div class="uk-container">
        <nav class="uk-navbar" uk-navbar>
            <div class="uk-navbar-left">
                {{ link_to_route('frontend.index', $tenant->name, [], ['class' => 'uk-navbar-item uk-logo']) }}
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav uk-visible@m" id="top-nav">
                    @if ($logged_in_user)
                        <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard')) }}</li>
                    @endif

                    <?php /*
                    @if ($logged_in_user)
                        <li>{{ link_to_route('frontend.user.dashboard', trans('navs.frontend.reports')) }}</li>
                    @endif

                    @if (config('locale.status') && count(config('locale.languages')) > 1)
                        <li>
                            <a href="#" class="uk-parent">
                                {{ trans('menus.language-picker.language') }}
                                <span class="caret"></span>
                            </a>

                            <div class="uk-navbar-dropdown">
                                @include('includes.partials.lang')
                            </div>
                        </li>
                    @endif

                    <li>{{ link_to_route('frontend.macros', trans('navs.frontend.macros')) }}</li>
                    */ ?>

                    @if (! $logged_in_user)
                        <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}</li>

                        @if (config('access.users.registration'))
                            <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }}</li>
                        @endif
                    @else
                        <li>
                            <a href="#" aria-expanded="false">
                                {{ $logged_in_user->name }} <span class="caret"></span>
                            </a>

                            <div class="uk-navbar-dropdown">
                                <ul class="uk-nav uk-navbar-dropdown-nav" role="menu">
                                    @permission('view-backend')
                                        <li>{{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) }}</li>
                                    @endauth

                                    <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account')) }}</li>
                                    <li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
                                </ul>
                            </div>
                        </li>
                    @endif
                </ul>
                <div uk-togglee="target: #offcanvas" uk-navbar-toggle-icon class="uk-navbar-toggle uk-hidden@m"></div>
            </div>
        </nav>
    </div>
</div>
