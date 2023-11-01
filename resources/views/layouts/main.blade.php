<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
        <meta charset="utf-8" />
        <title>Ikonic Task</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
  
         <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/theme/logo.jpg') }}" />
   
     <link rel="stylesheet" href="{{ asset('backendassets/css/main.css?v=1.1') }}" />
     <link rel="stylesheet" href="{{ asset('backendassets/imgs/theme/favicon.svg') }}" />
</head>
 <body>
       
       
     
            <header class="main-header navbar">
                <div class="col-search">
                  <a href="{{ url('/') }}">
                     <img src="{{ asset('backendassets/imgs/logo-color.png') }}" alt="Card Image" width="100">
                    </a>
                </div>
                <div class="col-nav">



                 






                    <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i class="material-icons md-apps"></i></button>
                    <ul class="nav">
                       
                      
                        <li class="dropdown nav-item">
                           @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </li>
                    </ul>
                </div>
            </header>




 <section class="content-main">
            @yield('content')
        </section>






              <!-- content-main end// -->
            <footer class="main-footer font-xs">
                <div class="row pb-30 pt-15">
                    <div class="col-sm-6">
                        
                      
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end"></div>
                    </div>
                </div>
            </footer>
    
         <script src="{{ asset('backendassets/js/vendors/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('backendassets/js/vendors/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backendassets/js/vendors/select2.min.js') }}"></script>
<script src="{{ asset('backendassets/js/vendors/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backendassets/js/vendors/jquery.fullscreen.min.js') }}"></script>
<script src="{{ asset('backendassets/js/vendors/chart.js') }}"></script>

<!-- Main Script -->
<script src="{{ asset('backendassets/js/main.js') }}?v=1.1" type="text/javascript"></script>
<script src="{{ asset('backendassets/js/custom-chart.js') }}" type="text/javascript"></script>
    </body>
</html>

