<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="msapplication-tap-highlight" content="no">
    <title>FoodApp</title>

    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <meta name="author" content="Jhordy Huaman Ollero" />
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />

    <!-- CORE CSS-->
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="font/icon.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="css/custom-style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- CSS style Horizontal Nav (Layout 03)-->
    <link href="css/style-horizontal.css" type="text/css" rel="stylesheet" media="screen,projection">

</head>
<body>
<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->
<!-- START HEADER -->
<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="teal">
            <div class="nav-wrapper">

                <ul class="right">
                    <li class="no-hover right"><a href="#" data-activates="slide-out" class="menu-sidebar-collapse btn-floating btn-flat btn-medium waves-effect waves-light cyan hide-on-large-only"><i class="mdi-navigation-menu" ></i></a></li>
                    <li><h1 class="logo-wrapper"><a href="/" class="brand-logo right"><img src="images/materialize-logo.png" alt="materialize logo"></a> <span class="logo-text">Material</span></h1></li>
                </ul>
                <div class="header-search-wrapper hide-on-med-and-down" style="margin-top: 11px;">
                    <i class="mdi-action-search"></i>
                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize"/>
                </div>
                <ul class="left hide-on-med-and-down">
                    <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                    </li>
                    <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-navigation-apps"></i></a>
                    </li>
                    <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-social-notifications"></i></a>
                    </li>
                    <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- HORIZONTL NAV START-->
        <nav id="horizontal-nav" class="white hide-on-med-and-down">
            <div class="nav-wrapper">

                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    @if($category != null)
                    @foreach ($category as $cat)
                        @if($cat->estado == 1)
                        <li>
                            <a class="dropdown-menu cyan-text" href="#!" data-activates="{{ $cat->nombre_categoria }}">
                                <i class="{{ $cat->icon }}"></i>
                                <span>{{ $cat->nombre_categoria }}<i class="mdi-navigation-arrow-drop-down right"></i></span>
                            </a>
                        </li>
                        @endif
                        <ul id="{{ $cat->nombre_categoria }}" class="dropdown-content dropdown-horizontal-list">
                        @foreach ($links as $url)
                                @if($cat->idCategory == $url->id_category)
                                    @if($url->estado == 1)
                                  <li><a href="{{ $url->url }}" class="cyan-text">
                                          {{ $url->nombre_url }}
                                          @if($url->new == 1)
                                              <span class="new badge"></span>
                                          @endif
                                      </a></li>
                                    @endif
                                @endif
                         @endforeach
                        </ul>

                    @endforeach
                    @endif
                </ul>
            </div>
        </nav>





    </div>
    <!-- end header nav-->
</header>
<!-- END HEADER -->
<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav hide-on-large-only">
            <ul id="slide-out" class="side-nav leftside-navigation ">
                <li class="user-details cyan darken-2">
                    <div class="row">
                        <div class="col col s4 m4 l4">
                            <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                        </div>
                        <div class="col col s8 m8 l8">
                            <ul id="profile-dropdown" class="dropdown-content">
                                <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                </li>
                                <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                </li>
                                <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                                </li>
                                <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                </li>
                            </ul>
                            <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">John Doe<i class="mdi-navigation-arrow-drop-down right"></i></a>
                            <p class="user-roal">Administrator</p>
                        </div>
                    </div>
                </li>
              @if($category != null)
                @foreach ($category as $cat)
                    <li>
                        <a class="dropdown-menu cyan-text" href="#!" data-activates="{{ $cat->nombre_categoria }}-2">
                            <i class="{{ $cat->icon }}"></i>
                            <span>{{ $cat->nombre_categoria }}</span>
                        </a>
                    </li>

                        @foreach ($links as $url)
                            @if($cat->idCategory == $url->id_category)
                                <li><a href="{{ $url->url }}" style="margin: 0 1rem 0 3rem;">
                                        {{ $url->nombre_url }}
                                        @if($url->new == 1)
                                            <span class="new badge" style="position:inherit;"></span>
                                        @endif
                                    </a></li>
                            @endif
                        @endforeach


                @endforeach
               @endif
            </ul>
            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
        @yield('slideshow')
        <!-- START CONTENT -->
        <section id="content">

            <!--start container-->
            <div class="container">
           @yield('content')
            </div>
         </section>
     </div>
</div>
<!-- START FOOTER -->
<footer class="page-footer teal darken-1">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">World Market</h5>
                <p class="grey-text text-lighten-4">World map, world regions, countries and cities.</p>
                <div id="world-map-markers"></div>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Sales by Country</h5>
                <p class="grey-text text-lighten-4">A sample polar chart to show sales by country.</p>
                <div id="polar-chart-holder">
                    <canvas id="polar-chart-country" width="200"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Copyright © 2015 <a class="grey-text text-lighten-4" href="http://themeforest.net/user/geekslabs/portfolio?ref=geekslabs" target="_blank">GeeksLabs</a> All rights reserved.
            <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://geekslabs.com/">GeeksLabs</a></span>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
<!-- jQuery Library -->
{!! Html::script('js/jquery-3.1.1.min.js') !!}
{!! Html::script('js/jquery-1.11.2.min.js') !!}

<!--materialize js-->
<script type="text/javascript" src="js/materialize.js"></script>
<!--scrollbar-->
<script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>



{!! Html::script('js/app/product/product.js') !!}

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="js/plugins.js"></script>
<script src="js/classie.js"></script>
<script src="js/dynamics.min.js"></script>
<script src="js/main.js"></script>
@yield('footer')

</body>

</html>

