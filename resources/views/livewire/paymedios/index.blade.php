@extends('layouts.app')
@section('content')
<nav style="margin-top:-10px;"  class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <div class="container">
        <a href="{{ url('adm/paymediosdetails') }}" class="nav-link"><i class="fab fa- text-info"></i> 🗂️ Crear MediosPagos Studio/Models</a> 
  </nav>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('paymedios')
        </div>     
    </div>   
</div>
@endsection