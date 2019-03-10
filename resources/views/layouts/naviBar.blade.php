<!DOCTYPE html>
<head>
    <meta charset="utf-8">
        <title>{{ config('app.name1', 'The Cake Smith') }}</title>

    <!-- Styles -->
     <link href="{{ asset('css/trackStatus.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    @section('topNavi')
	<nav class = "navbar navbar-inverse navbar-fixed-top">
		<div class = "container-fluid">
			<div class = "navbar-header">

				<button type= "button" class="navbar-toggle collapsed" data-toggle="collapsed" data-target="#app-navbar-collapse" aria-expanded="false">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{ url ('/')}}">
                	The Cake Smith
                </a>
            </div>

            	<ul class="nav navbar-nav">
                    <li><a href="{{ url('/')}}">Home</a></li>
                    <li><a href="{{ url('/menuBar/aboutUs')}}">About Us</a></li>
                    <li><a href="{{ url('/menuBar/menu')}}">Menu</a></li>
                    <li><a href="{{ url('/menuBar/orderOnline')}}">Order Online</a></li>
                    <li><a href="{{ url('/menuBar/location')}}">Location</a></li>
                    <li><a href="{{ url('/menuBar/contactUs')}}">Contact Us</a></li>
                </ul>
                 <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                 <!-- Authentication Links -->
                 		
                  		@guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register')}}">Register</a></li>
                        @else
                        	<li class="dropdown">
                        		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    <?= Auth::user()->firstname . " " . Auth::user()->lastname?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('editProfile', ['id'=> Auth::user()->id]) }}">Edit Profile</a> 

                                    </li>
                                    <li>
                                        <a href="{{ route('historyPurchase') }}">History Purchased</a> 

                                    </li>
                                    <li>
                                        <a href="{{ route('trackOrder') }}">Track My Order</a> 

                                    </li>
                                	<li>
                                		 <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout
                                       		</a>

										<!-- Not Sure For What -->
                                       	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                    </li>
                                </ul>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <div style="margin-bottom:51px;"></div>
             <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

    @section('footer')
       <!-- <div class="footer navbar-fixed-bottom" style="margin-top:20px;z-index:1; position:relative;background-color: black; padding: 25px; ">-->
        <footer class="font-small fixed-bottom" style="margin-top:100px; background-color:black;width:100%;padding:25px;">
            <div class="text-center" style="color: white;margin-top: 5px">Copyright © 2018 AisimBakery.All Rights Reserved.</div>
        </footer>
    @endsection

@yield('topNavi')
@yield('content')
@yield('footer')

  </body>
</html>
