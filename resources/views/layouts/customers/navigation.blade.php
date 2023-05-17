<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{route('landing')}}">
            <img src="{{asset('landing/images/logo.png')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (request()->routeIs('customer.*'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('customer.dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('customer.edit')}}">Profile</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Benefits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Feedback</a>
                    </li>
                @endif
            </ul>
            @auth
            <div class="d-flex user-logged nav-item dropdown no-arrow">
                <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Halo, {{Auth::user()->name}}!
                    @if (Auth::user()->avatar)
                        <img src="{{Auth::user()->avatar}}" class="user-photo" style="border-radius: 50%" alt="">
                    @else
                        <img src="https://ui-avatars.com/api/?name=Administrator" class="user-photo" style="border-radius: 50%" alt=""> 
                    @endif
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="right:0; left:auto">
                        <li>
                            <a href="{{Auth::user()->is_admin ? route('admin.dashboard') : route('customer.dashboard')}}" class="dropdown-item">My Dashboard</a>
                        </li>
                        <li>
                            <a href="{{Auth::user()->is_admin ? route('admin.profile.edit') : route('customer.edit')}}" class="dropdown-item">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Sign Out</a>
                            <form id="logout-form" action="{{route('logout')}}" method="post" style="display:none">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </form>
                        </li>
                    </ul>
                </a>
            </div>
            @else
            <div class="d-flex">
                <a href="{{route('customer.login')}}" class="btn btn-master btn-secondary me-3">
                    Sign In
                </a>
                <a href="#" class="btn btn-master btn-primary">
                    Sign Up
                </a>
            </div>
            @endauth
        </div>
    </div>
</nav>