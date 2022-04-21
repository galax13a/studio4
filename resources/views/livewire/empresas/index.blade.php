@extends('layouts.app')
@section('content')

<x-menuadmin.empresa></x-menuadmin.empresa>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('empresas')
        </div>     
    </div>   
</div>
@endsection