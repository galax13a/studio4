@extends('layouts.app')
@section('content')
<x-Menuadmin.empresa></x-Menuadmin.empresa>
<x-menuxnav>
  <x-slot name="menu">
    <a href="{{ route('modelos') }}" class="nav-link"><i class="fab fa- text-info"></i> Modelos</a> 
    </x-slot>
</x-menuxnav>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('modelos')
        </div>     
    </div>   
</div>
@endsection