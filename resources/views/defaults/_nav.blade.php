<div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-info">
                <div class="container">
                        <a class="navbar-brand logo" href="{{ url('/') }}">
                            <img src="{{asset('images/sslogo.png')}}" alt="logo" width=190px; height=80px;>
                        </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                                <li>  <a href="{{url('/')}}" class=" btn btn-secondary">Home</a></li>
                                &nbsp;
                                <li><a href="{{url('/about')}}" class=" btn btn-secondary">About</a></li>
                                &nbsp;
                                <li><a href="{{url('/articles')}}" class=" btn btn-secondary">Articles</a></li>
                                &nbsp;
                                <li><a href="{{url('/stories')}}" class=" btn btn-secondary">Stories</a></li>
                                &nbsp;
                                <li><a href="{{url('/videos')}}" class=" btn btn-secondary">Video Stories</a></li>
                                &nbsp;
                                <li><a href="{{url('/notes')}}" class=" btn btn-secondary">Booknotes</a></li>
                                &nbsp;
                                <li><a href="{{url('/contact')}}" class=" btn btn-secondary">Contact-us</a></li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            @else
                                                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                        <li>
                                            <a href="#" class="btn btn-primary">
                                               <i class="fa fa-user"><strong>Profil</strong></i> 
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        </li>
                                        <li>
                                                <a href="{{route('home')}}" class=" btn btn-primary"> 
                                                   <i class="fa fa-home"></i> Back
                                                </a>
                                        </li>
                                        <li class="divider"></li>
                                    </ul>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
    </div>