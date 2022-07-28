<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <div wire:poll.60s>
    <a  class="btn-dolar p-1 text-capitalize shadow-sm" href="{{ route('dolars') }}">
      
             @foreach ($dolar as $dola)
            <strong> {{$title}} </strong> <span class="badge badge-light">{{ number_format($dola->trm, 0) }}</span>
            @endforeach 
        
      </a>
    </div>
</div>
<style>
  
         
      .btn-dolar  {background-image: linear-gradient(to right, #B3FFAB 0%, #12FFF7  51%, #B3FFAB  100%)}
         .btn-dolar {
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: #000;            
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
          }
       
          .btn-dolar:hover {
            background-position: left center; /* change the direction of the change here */
            color:green;
            text-decoration: none;
            cursor:pointer;
          }
         
</style>