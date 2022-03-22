@extends('layouts.app')
@section('content')
<nav style="margin-top:-20px;"  class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <div class="container">
        <a href="{{ url('adm/pages') }}" class="nav-link"><i class="fab fa-users text-info"></i>💛 Pages</a>
        <a href="{{ url('adm/pagemasters') }}" class="nav-link"><i class="fab fa- text-info"></i> 📟 MasterPages</a> 
        <a href="{{ url('adm/monedas') }}" class="nav-link"><i class="fab fa- text-info"></i>💰 Monedas</a> 
        <a href="{{ url('adm/empresas') }}" class="nav-link"><i class="fab fa- text-info"></i>🛡️ Empresas</a> 
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