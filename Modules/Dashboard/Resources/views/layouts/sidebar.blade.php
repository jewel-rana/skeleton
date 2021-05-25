<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('dashboard') }}"><span
                        class="brand-logo">
                        <h2 class="brand-text">POPTelecom</h2></span>
                </a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                    <i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span>
                </a>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Content Manager</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('product.index') }}">
                    <i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Email">Products</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('category.index') }}">
                    <i data-feather="message-square"></i><span class="menu-title text-truncate" data-i18n="Chat">Categories</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('page.index') }}">
                    <i data-feather="life-buoy"></i><span class="menu-title text-truncate" data-i18n="Raise Support">Pages</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('slider.index') }}">
                    <i data-feather="life-buoy"></i><span class="menu-title text-truncate" data-i18n="Raise Support">Slider</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('deal.index') }}">
                    <i data-feather="life-buoy"></i><span class="menu-title text-truncate" data-i18n="Raise Support">Deals</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('media.index') }}">
                    <i data-feather="life-buoy"></i><span class="menu-title text-truncate" data-i18n="Raise Support">Media</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('menu.index') }}">
                    <i data-feather="life-buoy"></i><span class="menu-title text-truncate" data-i18n="Raise Support">Menus</span>
                </a>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Administration</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('user.index') }}">
                    <i data-feather="life-buoy"></i><span class="menu-title text-truncate" data-i18n="Raise Support">Users</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('role.index') }}">
                    <i data-feather="life-buoy"></i><span class="menu-title text-truncate" data-i18n="Raise Support">Roles</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('permission.index') }}">
                    <i data-feather="life-buoy"></i><span class="menu-title text-truncate" data-i18n="Raise Support">Permissions</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
