@extends('layouts.app')
@section('content')

<nav style="margin-top:-10px;"  class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <div class="container">
        <a href="{{ url('adm/contablestudios') }}" class="nav-link"><i class="fab fa- text-info"></i> 🗂️ Create:: Sub-Contable</a> 
  </nav>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('contables')
        </div>     
    </div>   
</div>
@endsection