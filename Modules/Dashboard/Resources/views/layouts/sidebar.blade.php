<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('dashboard') }}"><span
                        class="brand-logo">
                    <h2 class="brand-text">POPTelecom</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
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
                    <i data-feather="email"></i><span class="menu-title text-truncate" data-i18n="Email">Products</span>
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
                <a class="d-flex align-items-center" href="/">
                    <i data-feather="life-buoy"></i><span class="menu-title text-truncate" data-i18n="Raise Support">Slider</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="/">
                    <i data-feather="life-buoy"></i><span class="menu-title text-truncate" data-i18n="Raise Support">Plans</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
