
@section('content')
@extends('layouts.app')

<x-Menuadmin.empresa></x-Menuadmin.empresa>
<x-menuxnav>
  <x-slot name="menu">
    <a href="{{ route('prizesdetails') }}" class="nav-link"><i class="fab fa- text-info"></i> 🔥 Winner Prizes</a> 
    </x-slot>
</x-menuxnav>

<div class="container">
 
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="card border-dark mb-2 shadow-lg" style="max-width: 18rem;">
                        <div class="card-header">⭐⭐⭐ Winners!</div>
                        <div class="card-body text-primary">
                          <h5 class="card-title">😃List Winners</h5>
                          <p class="card-text"> 

                            <ul>
                                <li>😺 Model 1</li>
                                <li>😺😺 Model 8</li>
                                <li>😺😺😺 Model 8</li>
                                <li>😺😺😺😺 Model 5</li>
                                <li>😺😺😺😺😺 Model 5</li>

                            </ul>
                          </p>
                          <div ontouchstart="">
                            <div class="button-priza">
                              <a href="#">Play💎</a>
                            </div>
                          </div>
                        </div>
                      </div>

                  </div>
                  <div class="col-12 col-md-8">
                    @livewire('prizes')
                  </div>
                </div>
              </div>
         
        </div>     
    </div>   
</div>


@endsection