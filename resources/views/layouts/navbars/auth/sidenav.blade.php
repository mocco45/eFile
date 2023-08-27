<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <div class="img-container">
                <img src="/img/image/kongwa-logo.png" class="navbar-brand-img img-logo" alt="main_logo">
            </div>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
    
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'tables') == true ? 'active' : '' }}" href="{{ route('tables') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
            </li>

            @if (auth()->user()->role_id == 1)

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   href="{{ route('manage') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manage</span>
                </a>
                <ul class="dropdown-menu {{ Route::currentRouteName() == 'subpage1' || Route::currentRouteName() == 'subpage2' ? 'keep-open' : '' }}">
                    <li><a class="dropdown-item {{ Route::currentRouteName() == 'new-user' ? 'active' : '' }}" href="{{ route('new-user') }}"><i class="fas fa-plus me-3"></i>Add User</a></li>
                    <li><a class="dropdown-item {{ Route::currentRouteName() == 'list-users' ? 'active' : '' }}" href="{{ route('list-users') }}"><i class="fas fa-list-ul me-3"></i>List Users</a></li>
                    <!-- Add more dropdown items as needed -->
                </ul>
            </li>

            @endif
            
        </ul>
    </div>
</aside>
