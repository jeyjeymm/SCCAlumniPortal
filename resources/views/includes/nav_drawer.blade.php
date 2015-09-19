<a class="brand-logo roboto-thin nav-title white-text hide-on-med-only hide-on-large-only">SCC Alumni Portal</a>

<ul class="side-nav" id="sidenav">

    @if (Auth::check())

        <div class="center">

            <img class="responsive-img circle" src="{{ url('images/logo.png') }}" alt="logo" />

            <a>Hi, {{ Auth::user()->name }}!</a>

        </div>

    @endif

    <li class="divider"></li>

    <li disabled><a href=" {{ url('articles') }} ">Home</a></li>

    @if (Auth::check())

        @if (Auth::user()->role->name === 'user')

            <li><a href=" {{ url('profiles') }} ">Profile</a></li>

        @endif

    @endif

    <li><a href=" {{ url('threads') }} ">Forum</a></li>

    <li><a href=" {{ url('about') }} ">About</a></li>

    <li class="divider"></li>

    @if (Auth::check())

        <li><a href=" {{ url('password/email') }} ">Reset Password</a></li>
        <li><a href=" {{ url('auth/logout') }} ">Logout</a></li>

    @else

        <li><a href=" {{ url('auth/login') }} ">Login</a></li>

    @endif

</ul>