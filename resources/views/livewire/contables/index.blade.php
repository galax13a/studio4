@extends('layouts.app')
@section('content')
<x-Menuadmin.empresa></x-Menuadmin.empresa>
<x-menuxnav>
    <x-slot name="menu">
        <a href="{{ route('contablestudios') }}" class="nav-link"><i class="fab fa- text-info"></i> 🗂️ Create:: Sub-Contable</a>  
      </x-slot>
</x-menuxnav>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('contables')
        </div>     
    </div>   
</div>
@endsection