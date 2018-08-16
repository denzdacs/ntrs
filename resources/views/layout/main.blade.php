<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>NTRS-@yield('title')</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/table.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        @yield('css')
    </head>
    <body>
    <div id="app">
	@if(Auth::user())
	    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
		<div class="container">
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		    </button>

		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
			    <li class="nav-item">
				<a class="nav-link custom-link" href="/">
				    <img class="logo" src="{{ asset('images/Province_of_Biliran_Official_Seal.png') }}">
				    Naval Trisikad Registration System
				</a>
			    </li>
			</ul>
			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
			    <!-- Authentication Links -->
			    <li class="nav-item dropdown">
				<a id="navbarDropdown" class="nav-link dropdown-toggle custom-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
				    <img class="logo" src="{{ asset('images/Naval_biliran_seal.png') }}">
				    Welcome  {{ Auth::user()->fname}}
				</a>


				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				    <a class="dropdown-item" href="/settings">
					<i class="fa fa-lg fa-plus"></i> Create Account
					
				    </a>
				    <a class="dropdown-item" href="/settings">
					<i class="fa fa-lg fa-cogs"></i> Settings
					
				    </a>
				    <a class="dropdown-item" href="/logout">
					<i class="fa fa-lg fa-sign-out"></i> Logout
					
				    </a>
				</div>
			    </li>
			</ul>
		    </div>
		</div>
	    </nav>
	@endif
            @if($errors->first('success'))
                <div class="message success">
                    {{$errors->first('success')}}
                </div>
            @else
                @foreach($errors->all() as $error) 
                    <div class="message error">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
	    <main class="py-4">
	        <div class="container">
                    @yield('content')
                </div>
	    </main>
	</div>
	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('js/table.js') }}"></script>
	<script src="{{ asset('js/main.js') }}"></script>
        @yield('js')
    </body>
</html>
