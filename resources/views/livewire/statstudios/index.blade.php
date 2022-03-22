@extends('layouts.app')
@section('content')
<x-Menuadmin.empresa></x-Menuadmin.empresa>
<x-menuxnav>
    <x-slot name="menu">
        Sta Menu
      </x-slot>
</x-menuxnav>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('statstudios')
        </div>     
    </div>   
</div>
@endsection