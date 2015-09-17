<div class="navbar-fixed">

    <nav class="red darken-4" id="my_nav">

        <div class="nav-wrapper">

            <!-- Navbar items -->
            <div id="nav_items_container">

                <a href="#" data-activates="sidenav" class="button-collapse"><i class="tiny material-icons">menu</i></a>
                
                 <img id="logo" class=" brand-logo center responsive-img z-depth-1 circle hide-on-med-and-down" style="margin: 5px" src="{{ url('images/logo.png') }}" />
                
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

                                {{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i>

                            </a>

                        </li>

                    @else

                        <a class="btn waves-effect white-text red darken-1" href=" {{ url('auth/login') }} ">Login</a>

                    @endif

                </ul>    

                <a class="brand-logo roboto-thin nav-title white-text hide-on-med-only hide-on-large-only">SCC Alumni Portal</a>

                <ul class="side-nav" id="sidenav">

                    @if (Auth::check())

                        <a class="center" disabled>Hi, {{ Auth::user()->name }}!</a>

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

                    @if (Auth::check())

                        <li><a href=" {{ url('auth/logout') }} ">Logout</a></li>

                    @else

                        <li><a href=" {{ url('auth/login') }} ">Login</a></li>

                    @endif

                </ul>

            </div>

            <!-- Search navbar -->
            <div id="nav_search_container" style="display: none">

                <div class="input-field">

                    <input id="nav_search" type="search" required>

                    <label for="nav_search"><i class="material-icons">search</i></label>

                </div>

            </div>

        </div>

    </nav>

</div>

<!-- Dropdown Structure -->
<ul id="nav_dropdown" class="dropdown-content">

  <li><a href=" {{ url('auth/logout') }} ">Logout</a></li>

</ul>