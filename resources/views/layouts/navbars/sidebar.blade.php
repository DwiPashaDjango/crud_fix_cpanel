<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-black" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
          <bold><h1><font color= #00000> ICONIC </font></h1></bold>
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            @if(Auth::user()->role=="Admin" )
                <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.index') }}">
            <i class='fas fa-users-cog' style='font-size:18px;color:blue'></i>
            <span class="nav-link-text" style="color: #090909;">{{ __('Management Users') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#navbar-examples1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples1">
            <i class='fas fa-building' style='font-size:18px;color:red'></i>
            <span class="nav-link-text" style="color: #090909;">{{ __('Store Information') }}</span>
        </a>
        <div class="collapse" id="navbar-examples1">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('stores.index') }}">
                        <i class='fas fa-building' style='font-size:18px;color:blue'></i>
                        <span class="nav-link-text" style="color: #090909;">{{ __('All Store') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples2">
            <i class='fa fa-archive' style='font-size:18px;color:black'></i>
            <span class="nav-link-text" style="color: #090909;">{{ __('SLoc Monitoring') }}</span>
        </a>
        <div class="collapse" id="navbar-examples2">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sloc.dashboard') }}">
                        <i class='ni ni-tv-2 text-primary' style='font-size:18px;color:black'></i>
                        <span class="nav-link-text" style="color: #090909;">{{ __('Dashboard SLoc') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sloc.index') }}">
                        <i class='fas fa-user-edit' style='font-size:18px;color:green'></i>
                        <span class="nav-link-text" style="color: #090909;">{{ __('To Do List') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sloc.index1') }}">
                        <i class='fas fa-spinner' style='font-size:18px;color:black'></i>
                        <span class="nav-link-text" style="color: #090909;">{{ __('In Progress') }}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sloc.index2') }}">
                        <i class='fas fa-check-circle' style='font-size:18px;color:blue'></i>
                        <span class="nav-link-text" style="color: #090909;">{{ __('Done') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
</ul>
            @elseif(Auth::user()->role=="ICO" )
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">
                            <i class='fas fa-users-cog' style='font-size:18px;color:blue'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('Management Users') }}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-examples1" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples1">
                            <i class='fas fa-building' style='font-size:18px;color:red'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('Store Information') }}</span>
                        </a>
                        <div class="collapse hidden" id="navbar-examples1">
                            <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('stores.index0') }}">
                            <i class='fas fa-building' style='font-size:18px;color:green'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('Your Store') }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('stores.index') }}">
                            <i class='fas fa-building' style='font-size:18px;color:blue'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('All Store') }}</span>
                            </a>
                            </li>
                    </li> 
                </ul>
                <li class="nav-item">
                        <a class="nav-link active" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples2">
                            <i class='fa fa-archive' style='font-size:18px;color:black'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('SLoc Monitoring') }}</span>
                        </a>
                        <div class="collapse hidden" id="navbar-examples2">
                            <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('sloc.dashboard') }}">
                            <i class='ni ni-tv-2 text-primary' style='font-size:18px;color:black'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('Dashboard SLoc') }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('sloc.index') }}">
                            <i class='fas fa-user-edit' style='font-size:18px;color:green'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('To Do List') }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('sloc.index1') }}">
                            <i class='fas fa-spinner' style='font-size:18px;color:black'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('In Progress') }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('sloc.index2') }}">
                            <i class='fas fa-check-circle' style='font-size:18px;color:blue'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('Done') }}</span>
                            </a>
                            </li>
                    </li> 
                </ul>
            @elseif(Auth::user()->role=="PIC" )
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">
                            <i class='fas fa-users-cog' style='font-size:18px;color:blue'></i>
                            <span class="nav-link-text" style="color: #00000;">{{ __('Management Users') }}</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-examples1" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples1">
                            <i class='fas fa-building' style='font-size:18px;color:red'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('Store Information') }}</span>
                        </a>
                        <div class="collapse hidden" id="navbar-examples3">
                            <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('stores.index') }}">
                            <i class='fas fa-building' style='font-size:18px;color:blue'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('All Store') }}</span>
                            </a>
                            </li>
                    </li> 
                </ul>
                <li class="nav-item">
                        <a class="nav-link active" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples2">
                            <i class='fa fa-archive' style='font-size:18px;color:black'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('SLoc Monitoring') }}</span>
                        </a>
                        <div class="collapse hidden" id="navbar-examples2">
                            <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('sloc.dashboard') }}">
                            <i class='ni ni-tv-2 text-primary' style='font-size:18px;color:black'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('Dashboard SLoc') }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('sloc.index') }}">
                            <i class='fas fa-user-edit' style='font-size:18px;color:green'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('To Do List') }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ url('service.selesai') }}">
                            <i class='fas fa-spinner' style='font-size:18px;color:black'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('In Progress') }}</span>
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="{{ url('service.selesai') }}">
                            <i class='fas fa-check-circle' style='font-size:18px;color:blue'></i>
                            <span class="nav-link-text" style="color: #090909;">{{ __('Done') }}</span>
                            </a>
                            </li>
                    </li> 
                </ul>
            @endif
        </div>
    </div>
</nav>