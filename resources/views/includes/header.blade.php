<header id="header">

    <div class="navbar-fixed">

        <nav class="red darken-4">

            <div class="nav-wrapper">

                <!-- Navbar items -->
                <div id="main_container">

                    <a href="#!" data-activates="sidenav" class="button-collapse"><i class="tiny material-icons">menu</i></a>
                    
                    <img id="logo" height="60px" width="60px" class="brand-logo center responsive-img circle hide-on-med-and-down" src="{{ url('images/logo.png') }}" />
                    
                    <a class="brand-logo margin-sides roboto-thin white-text hide-on-small-only">San Carlos College Alumni Portal</a>                  

                    <ul class="right hide-on-med-and-down margin-sides">

                        <li><a href=" {{ url('articles') }} ">Home</a></li>

                        @if (Auth::check())

                            @if (Auth::user()->role->name === 'user')

                                <li><a href=" {{ url('profiles') }} ">Profile</a></li>

                            @endif

                        @endif

                        <li><a href=" {{ url('threads') }} ">Forum</a></li>

                        <li><a href=" {{ url('about') }} ">About</a></li>

                        @if (Auth::check())

                            <!-- Dropdown Trigger -->
                            <li>
                                <a class="dropdown-button" href="#!" data-activates="nav_dropdown">

                                    {{ Auth::user()->username }} <i class="material-icons right">arrow_drop_down</i>

                                </a>

                            </li>

                            <!-- Dropdown Structure -->
                            <ul id="nav_dropdown" class="dropdown-content">

                                <li><a href=" {{ url('password/email') }} ">Password</a></li>
                                <li class="divider"></li>
                                <li><a href=" {{ url('auth/logout') }} ">Logout</a></li>

                            </ul>

                        @else

                            <a class="btn waves-effect white-text red darken-1" href=" {{ url('auth/login') }} ">Login</a>

                        @endif

                    </ul>    

                    <!-- Navigation drawer for smaller screens -->
                    @include('includes.nav_drawer')


                </div>

                <!-- Search navbar -->
                <div id="search_container" style="display: none">

                    <div class="input-field">

                        <input id="input_search" type="search" required>

                        <label for="input_search"><i class="material-icons">search</i></label>

                    </div>

                </div>

            </div>

        </nav>

    </div>

</header>