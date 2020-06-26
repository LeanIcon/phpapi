<style>
.navbar-custom {
    background: #04031F;
    padding: 0 10px 0 0;
    margin-left: 240px;
    min-height: 70px;
    position: relative;
    -webkit-box-shadow: 0 6px 20px rgba(36, 37, 38, 0.08);
    box-shadow: 0 6px 20px rgba(36, 37, 38, 0.08);
}

.topbar .topbar-left {
    background-color: #04031F;
    float: left;
    text-align: center;
    height: 70px;
    position: relative;
    width: 270px;
    z-index: 1;
    -webkit-box-shadow: 0px 8px 3px -3px rgba(28, 45, 65, 0.05);
    box-shadow: 0px 8px 3px -3px rgba(28, 45, 65, 0.05);
}
.navbar-custom .topbar-nav li.show .nav-link {
    background-color: #04031F;
    color: #828db1;
}

.dropdown-menu {
    padding: 4px 0;
    font-size: 13px;
    -webkit-box-shadow: 0 3px 12px rgba(182, 194, 228, 0.05);
    box-shadow: 0 3px 12px rgba(182, 194, 228, 0.05);
    border-color: #04031F;
    margin: 0;
}
</style>
<!-- Top Bar Start -->
        <div class="topbar">


            <!-- LOGO -->
            <div class="topbar-left">
                <a href="{{route('dashboard.index')}}" class="logo">
                </a>
                <span>
                	<a href="{{route('dashboard.index')}}">
                        <img src="{{url('admin/assets/images/NN.png')}}" class="logo-light"  style="height: 80%">
                    </span>
                </a>
            </div>
            <!--end logo-->
            <!-- Navbar -->
            <nav class="navbar-custom">    
                <ul class="list-unstyled topbar-nav float-right mb-0"> 
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-bell noti-icon"></i>
                            <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                            <!-- item-->
                            <h6 class="dropdown-item-text">
                                Notifications (18)


                            </h6>
                            @auth
                            @if (Auth::user()->hasRole('Admin'))
                            <div class="slimscroll notification-list">
                                <!-- item-->
                                @foreach ($wholesalers as $wholesaler)
                                @if (!$wholesaler->hasRole('Wholesaler'))
                                 <a href="{{route('approve.users', $wholesaler->id)}}" class="dropdown-item notify-item active">
                                     <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                     <p class="notify-details">{{$wholesaler->name}}
                                         <small class="text-muted">Pending Approval & Authorization</small></p>
                                 </a>
                                 @endif
                                @endforeach
                                @foreach ($retailers as $retailer)
                                 @if (!$wholesaler->hasRole('Retailer'))
                                 <a href="{{route('approve.users', $retailer->id)}}" class="dropdown-item notify-item active">
                                     <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                     <p class="notify-details">{{$retailer->name}}
                                         <small class="text-muted">Pending Approval & Authorization</small></p>
                                 </a>
                                 @endif
                                @endforeach

                            </div>
                            @endif
                            @endauth
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                View all <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false">
                            {{--  <img src="{{url('assets/images/users/user-4.jpg')}}" alt="profile-user" class="rounded-circle" />   --}}
                            <span class="ml-1 nav-user-name hidden-sm">
                                @auth
                                {{ Auth::user()->name }}
                                @endauth
                                <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{route('profile.index')}}"><i class="dripicons-user text-muted mr-2"></i> Profile</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted mr-2"></i> My Wallet</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-gear text-muted mr-2"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted mr-2"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" ><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul><!--end topbar-nav-->
    
                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        <button class="button-menu-mobile nav-link waves-effect waves-light">
                            <i class="dripicons-menu nav-icon"></i>
                        </button>
                    </li>
                    <li class="hide-phone app-search">
                        <form role="search" class="">
                            <input type="text" placeholder="Search..." class="form-control">
                            <a href=""><i class="fas fa-search"></i></a>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->