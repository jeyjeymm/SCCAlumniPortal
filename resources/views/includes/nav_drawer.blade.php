<a class="brand-logo roboto-thin nav-title white-text hide-on-med-only hide-on-large-only">SCC Alumni Portal</a>

<ul class="side-nav" id="sidenav">

    @if (Auth::check())

        @if(Auth::user()->profile()->first())

            <div class="center">

                <div class="pad_20" style="background-image: url( {{ url('images/gradient.png') }} );background-repeat: repeat-x;">

                    <img class="z-depth-2 responsive-img circle" 
                        src="{{ route('getPhoto',[

                                'url' => 'profiles' . '.' . Auth::user()->profile->id . '.' . 'profile_picture' , 

                                'name' => Auth::user()->profile->image_name ? Auth::user()->profile->image_name : 'default'

                                ])}}" alt="Profile picture">

                </div>

                <h5 class="black-text"> {{ Auth::user()->name }} </h5>

                <a class="btn-flat waves-effect waves-red" href="{{ url('profiles/' . Auth::user()->profile->id . '/edit') }}">

                    Edit my profile

                </a>


            </div>

        @else

            <div class="center pad_20">

                <img class="responsive-img circle" src="{{ url('images/logo.png') }}" alt="logo" />

                <h5 class="black-text">Hi, {{ Auth::user()->name }}!</h5>

            </div>

        @endif

    @endif

    <li class="divider"></li>

    <li disabled><a href=" {{ url('articles') }} ">Home</a></li>

    @if (Auth::check())

        @if (Auth::user()->profile()->first())

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