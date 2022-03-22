@extends('layouts.app')
@section('content')
<nav style="margin-top:-20px;"  class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <div class="container">
        <a href="{{ route('pages-cams') }}" class="nav-link"><i class="fab fa-users text-info"></i>💛 Pages</a>
        <a href="{{ route('master') }}" class="nav-link"><i class="fab fa- text-info"></i> 📟 MasterPages</a> 
        <a href="{{ route('monedas') }}" class="nav-link"><i class="fab fa- text-info"></i>💰 Monedas</a> 
        <a href="{{ route('business') }}" class="nav-link"><i class="fab fa- text-info"></i>🛡️ Empresas</a> 
    </div>
  </nav>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('pagemasters')
        </div>     
    </div>   
</div>
@endsection