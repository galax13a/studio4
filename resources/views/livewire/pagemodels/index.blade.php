@extends('layouts.app')
@section('content')

<x-Menuadmin.empresa></x-Menuadmin.empresa>
<x-menuxnav>    
    <x-slot name="menu">
        <a href="#  " class="nav-link"><i class="fab fa- text-info"></i> 🗂️ PageModel</a>  
      </x-slot>
</x-menuxnav>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('pagemodels')
        </div>     
    </div>   
</div>
@endsection