<ul class="navbar-nav navbar-sidenav">
    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.dashboard')">
        <a class="nav-link {{ request()->route()->named('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.dashboard')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.products')">
        <a class="nav-link {{ request()->route()->named('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.products')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.companies')">
        <a class="nav-link {{ request()->route()->named('admin.companies.*') ? 'active' : '' }}" href="{{ route('admin.companies.index') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.companies')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.countries')">
        <a class="nav-link {{ request()->route()->named('admin.countries.*') ? 'active' : '' }}" href="{{ route('admin.countries.index') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.countries')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.cities')">
        <a class="nav-link {{ request()->route()->named('admin.cities.*') ? 'active' : '' }}" href="{{ route('admin.cities.index') }}">
            <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.cities')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.comments')">
        <a class="nav-link {{ request()->route()->named('admin.comments.*') ? 'active' : '' }}" href="{{ route('admin.comments.index') }}">
            <i class="fa fa-comments" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.comments')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.users')">
        <a class="nav-link {{ request()->route()->named('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
            <i class="fa fa-users" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.users')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.media')">
        <a class="nav-link {{ request()->route()->named('admin.media.*') ? 'active' : '' }}" href="{{ route('admin.media.index') }}">
            <i class="fa fa-file" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.media')</span>
        </a>
    </li>

    <li class="nav-item" role="presentation" data-toggle="tooltip" data-placement="right" title="@lang('dashboard.panel')">
        <a class="nav-link" target="_blank" href="{{ url('telescope') }}">
            <i class="fa fa-file" aria-hidden="true"></i>&nbsp;
            <span class="nav-link-text">@lang('dashboard.panel')</span>
        </a>
    </li>

</ul>

<ul class="navbar-nav sidenav-toggler">
    <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
        </a>
    </li>
</ul>
