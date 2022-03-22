@extends('layouts.app')


@section('content')


  <nav style="margin-top:-10px;"  class="navbar navbar-expand-lg navbar-light bg-light mb-2">
    <div class="container">
        <a href="{{ url('adm/prizesdetails') }}" class="nav-link"><i class="fab fa- text-info"></i> 🔥 Winner Prizes</a> 
  </nav>
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