@section('title', __('Prizes'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
					<x-headform>
							<x-slot name="title"> 💎 Prizes! </x-slot>
							<x-slot name="title_btn">Crear Prize</x-slot>
							<x-slot name="title_input">Busqueda</x-slot>
					</x-headform>
				<div class="card-body">
						@include('livewire.prizes.create')
						@include('livewire.prizes.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Description</th>
								<th>Date</th>
								<th>Date2</th>
								<th>Value</th>
								<th>Status</th>
								<th>Img</th>
								<th>Studio</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($prizes as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->description }}</td>
								<td>{{ $row->date }}</td>
								<td>{{ $row->date2 }}</td>
								<td>{{ $row->value }}</td>
								<td>{{ $row->status }}</td>
								<td>{{ $row->img }}</td>
								<td>{{ $row->estudio->name }}</td>
						
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $prizes->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
    .button-priza{
  position:relative;
  display:inline-block;
  margin:20px;
}

.button-priza a{
  color:white;
  font-family:Helvetica, sans-serif;
  font-weight:bold;
  font-size:36px;
  text-align: center;
  text-decoration:none;
  background-color:#FFA12B;
  display:block;
  position:relative;
  padding:20px 40px;
  
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
  text-shadow: 0px 1px 0px #000;
  filter: dropshadow(color=#000, offx=0px, offy=1px);
  
  -webkit-box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;
  -moz-box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;
  box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;
  
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.button-priza a:active{
  top:10px;
  background-color:#F78900;
  
  -webkit-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #915100;
  -moz-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3pxpx 0 #915100;
  box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #915100;
}

.button-priza:after{
  content:"";
  height:100%;
  width:100%;
  padding:4px;
  position: absolute;
  bottom:-15px;
  left:-4px;
  z-index:-1;
  background-color:#2B1800;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}
</style>