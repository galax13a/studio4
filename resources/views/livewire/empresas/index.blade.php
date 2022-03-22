@extends('layouts.app')
@section('content')
<nav style="margin-top:-20px;"  class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <div class="container text-center">
        <a href="{{ url('adm/estudios') }}" class="nav-link"><i class="fab fa-users text-info"></i>🎥 Studios</a>
        <a href="{{ url('adm/modelos') }}" class="nav-link"><i class="fab fa-users text-info"></i>💛 Models</a>
        <a href="{{ url('adm/prizes') }}" class="nav-link"><i class="fab fa- text-info"></i> 💎 Prizes</a> 
        <a href="{{ url('adm/pagemodels') }}" class="nav-link"><i class="fab fa- text-info"></i>💌 PageModels</a> 
        <a href="{{ url('adm/contables') }}" class="nav-link"><i class="fab fa- text-info"></i>📁 Contables</a> 
       
        <a href="{{ url('adm/paymedios') }}" class="nav-link"><i class="fab fa- text-info"></i>💳 MediosPagos</a> 
        <a href="{{ url('adm/monetizadores') }}" class="nav-link"><i class="fab fa- text-info"></i>💵  Monetizadores</a> 
        <a href="{{ url('adm/paypages') }}" class="nav-link"><i class="fab fa- text-info"></i> 💰 Paypages</a> 
        <a href="{{ url('adm/statstudios') }}" class="nav-link"><i class="fab fa- text-info"></i>☀️ PayStudios</a> 
       
        <a href="{{ url('adm/pages') }}" class="nav-link"><i class="fab fa- text-info"></i>🧁 Pages</a>
        <a href="{{ url('adm/conexions') }}" class="nav-link"><i class="fab fa- text-info"></i>⏰ Conexions</a> 
        

    </div>
  </nav>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('empresas')
        </div>     
    </div>   
</div>
@endsection