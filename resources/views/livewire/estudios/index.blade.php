@extends('layouts.app')
@section('content')

<x-menuadmin.studio></x-menuadmin.studio>

<x-menuxnav>
    <x-slot name="menu">
        Estudios Sub-menu
      </x-slot>
</x-menuxnav>
    
<div class="container-fluid">
    <div class="row justify-content-center">
 
        <div class="col-md-12">
            
            @livewire('estudios')
        </div>     
    </div>   
</div>
@endsection