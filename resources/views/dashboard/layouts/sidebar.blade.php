<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                    <span data-feather="file-text"></span>
                    My Posts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/profile*') ? 'active' : '' }}" href="/dashboard/profile">
                    <span data-feather="file-text"></span>
                    Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/home*') ? 'active' : '' }}" href="/dashboard/uploadmainimage">
                    <span data-feather="file-text"></span>
                    Home Page
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/about*') ? 'active' : '' }}" href="/dashboard/about">
                    <span data-feather="file-text"></span>
                    About
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/products*') ? 'active' : '' }}" href="/dashboard/products">
                    <span data-feather="file-text"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/services*') ? 'active' : '' }}" href="/dashboard/services">
                    <span data-feather="file-text"></span>
                    Services
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/clients*') ? 'active' : '' }}" href="/dashboard/clients">
                    <span data-feather="file-text"></span>
                    Clients
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/projects*') ? 'active' : '' }}" href="/dashboard/projects">
                    <span data-feather="file-text"></span>
                    Projects
                </a>
            </li>
        </ul>

        @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" aria-current="page" href="/dashboard/categories">
                    <span data-feather="grid"></span>
                    Post Categories
                </a>
            </li>
        </ul>
        @endcan
    </div>
</nav>