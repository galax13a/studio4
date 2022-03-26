<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <!-- Styles -->
      <link href="{{ asset('css/adds.css') }}" rel="stylesheet">
    <link href="{{ asset('icons/fontawesome-free-6.1.1-web/css/all.min.css') }}" rel="stylesheet">
    <link defer rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
 
    <link defer rel="stylesheet" type="text/css" href="{{ asset('css/responsive.bootstrap5.min.css') }}"/>
 

	 @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand btn-grad p-2 rounded shadow-sm " href="{{ url('/') }}">
                  <strong> 🤖 {{ config('app.name', 'Cam4studio') }}</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
					@auth()
                    <ul class="navbar-nav mr-auto">
						<!--Nav Bar Hooks - Do not delete!!-->
						<li class="nav-item">
                            <a href="{{ url('/paystudios') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Paystudios</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ route('apichatur') }}" class="nav-link"><i class="fab fa- text-info"></i> 🍬Apicams</a> 
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('invoicepaystudios') }}" class="nav-link"><i class="fab fa- text-info"></i> 📑Invoice</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ route('master') }}" class="nav-link"><i class="fab fa-web text-info"></i> Master</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ route('business') }}" class="nav-link"><i class="fab fa- text-info"></i>Empresas</a> 
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dolars') }}" class="nav-link"><i class="fab fa- text-info"></i> Dolars</a> 
                        </li>
                    </ul>
                    
                    <x-Dolarwiget>
                        <x-slot name="title">Dolar Hoy</x-slot>
                    </x-Dolarwiget>
					@endauth()
					
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-2">
            @yield('content')
        </main>
    </div>
    @livewireScripts

    

    <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.responsive.min.js') }}"></script>

    


<script type="text/javascript">

document.addEventListener('livewire:load', function() {
    $.noConflict();
    
    $('#tablaxxx').DataTable({
                    destroy: true,
                    responsive:true,
                    autoWidth:false, 
                    buttons: [
                            'copy', 'excel', 'pdf'
                        ]
         });
         
	    window.livewire.on('tablex', () => {
            //$('#tablaxxx').DataTable.remove();
                                 //alert("emitio tablas upt");
                                 $('#tablaxxx').DataTable();
                            });

          $( "page-item" ).click(function() {
                                            alert( "Handler for .click() called." );
                                            
                                    });

        
    })

	window.livewire.on('closeModal', () => {
		$('#createDataModal').modal('hide');
	});

</script>

<style>
 
</style>
</body>
</html>
