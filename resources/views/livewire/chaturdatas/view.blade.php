@section('title', __('Chaturdatas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
				<x-headform>
					<x-slot name="title">ApiCams</x-slot>
					<x-slot name="title_btn">Crear Api</x-slot>
					<x-slot name="title_input">Busqueda</x-slot>
			</x-headform>
				
		<div class="card-body">
						@include('livewire.chaturdatas.create')
						@include('livewire.chaturdatas.update')
	
						
				<div class="table-responsive">
					<h1>
					<span class="badge badge-danger">Studio</span>
				</h1>
					<hr>
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th><Link-Api></Link-Api></th>
								<th>Type</th>
								<th>Status</th>
								<th>Studio</th>
								<th>Pagemaster </th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($chaturdatas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->link }}</td>
								<td>{{ $row->type }}</td>
								<td>{{ $row->status }}</td>
								<td>{{ $row->estudio->name }}</td>
								<td>

								@php

								try {
								$responde =  Http::get($row->link);
								$jsonData = $responde->json();
								//dd($jsonData);
							//echo "Totales0 : " = 
								
								$this->apichatur_range = $jsonData["range"];
								$this->apichatur_day = $jsonData["stats"][0]["rows"][0][0];
								$this->apichatur_tks = $jsonData["stats"][0]["rows"][0][1];
								//$this->apichatur_payout = $jsonData["totals"][0]["Payout"][0][2];
						
								$this->api_programa = $jsonData["stats"][0]["program"];

								$this->apichatur_payout = $jsonData["stats"][0]["totals"]["Payout"];
								$this->apichatur_tks = $jsonData["stats"][0]["totals"]["Tokens"];

								
  	                }catch(Exception $e){
									echo 'Error-Api-Cam '.'	<i style="cursor: pointer;" wire:click="store()" class="fa fa-spinner fa-2" aria-hidden="true"></i>';
									 echo $e->getMessage(), "\n";
									$this->apichatur_range = 0;
									$this->apichatur_day = 0;
									$this->apichatur_tks = 0;
									$this->apichatur_payout = 0;
								}
								
						    	@endphp	
									<div style="border:0ch;"  class="card text-center">
										<div class="card-header">
											<strong >
												{{ $row->pagemaster->name }} 
											</strong>
										</div>
										<div style="margin-top:-38px;" class="card-body">
										  <h6 class="card-title">{{$this->apichatur_day}}</h6>
										  <h3>${{$this->apichatur_payout}}USD</h3>
										  <a href="#" style="margin-top:-12px;" class="btn btn-warning shadow-mb"><b>Tokens/{{$this->apichatur_tks}}</b></a>
									</div>
									  </div>
								</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $chaturdatas->links() }}
					</div>
			@if ($this->data_model)
			<h1>
				<span class="badge badge-success">Models</span>
			</h1>
				@foreach ($data_model as $row )
					@php
							try {
								//code...
									//echo $row->link;
									$responde =  Http::get($row->link);
									$jsonData = $responde->json();
									//dd($jsonData);

									$this->api_username = $jsonData["username"];
									$this->num_followers = $jsonData["num_followers"];
									$this->api_token_balance = $jsonData["token_balance"];
									$this->api_time_online = $jsonData["time_online"];
									$this->api_tips_in_last_hour = $jsonData["tips_in_last_hour"];
									$this->api_token_balance = $jsonData["token_balance"];
									$this->api_satisfaction_score = $jsonData["satisfaction_score"];
									$this->api_num_tokened_viewers = $jsonData["num_tokened_viewers"];
									$this->api_votes_down = $jsonData["votes_down"];
									$this->api_votes_up = $jsonData["votes_up"];
									$this->api_last_broadcast = $jsonData["last_broadcast"];
									$this->api_num_registered_viewers = $jsonData["num_registered_viewers"];
									$this->api_num_viewers = $jsonData["num_viewers"];
									//echo 'es modelo /' . $this->api_username ;
								}catch(Exception $e){
								//throw $th;
									echo 'error: ';
									$this->api_username = 0;
									$this->api_token_balance =0;
									$this->api_time_online =0;
									$this->api_tips_in_last_hour = 0;
									$this->api_token_balance = 0;
									$this->api_satisfaction_score = 0;
									$this->api_num_tokened_viewers = 0;
									$this->api_votes_down = 0;
									$this->api_votes_up = 0;
									$this->api_last_broadcast = 0;
									$this->api_num_registered_viewers =0;
									$this->api_num_viewers =0;
							}
								
					@endphp

<div class="table-responsive">
	<table class="table table-bordered table-sm">
		<thead class="thead">
			<tr> 
				<td>#</td> 
				<th>Name</th>
				<th></th>
				<th>Type</th>
				<th>Status</th>
				<th>Studio</th>
				<th>Pagemaster </th>
				<td>ACTIONS</td>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td>{{ $loop->iteration }}</td> 
				<td>
					<div style="border:0ch;"  class="card">
						<div class="card-body">
				@php
					$dato_hrs = $this->api_time_online / 60;
				@endphp
			<a href="https://chaturbate.com/{{$this->api_username}}/" target="_blank">	 
					<h3 class=""><span class="badge badge-info">{{$this->api_username}}</span></h3>
			</a>	

				<h6 class="card-subtitle mb-2 text-muted"> Score  🏆 {{floatval($this->api_satisfaction_score)}}</h6>
						  <p class="card-text">  views room 👱‍♀️  ({{$this->api_num_viewers}}) </p>
						  <a href="#" class="card-link">Registers Views 🙎‍♂️ ({{number_format($this->api_num_registered_viewers,0)}})</a>
						  <a href="#" class="card-link">Follows 🔥 ( {{ number_format($this->num_followers,0)}})</a>
						</div>
					  </div>
				</td>
				<td>
					<div class="" >
						<img  class="rounded-circle p-2 text-center" width="120" height="96" src="https://roomimg.stream.highwebmedia.com/riw/{{$this->api_username}}.jpg">
						
						@if ($this->api_time_online>2)
						@php
							$txt_time = "0";
							$txt_div = null;

							if($this->api_time_online>60)
							{
								$txt_time =" Hr.s";
								$txt_div=$this->api_time_online / 60;
								//$txt_div =  ." ".$txt_time;
								$formato_conexion =	$txt_div. $txt_time;
								$tiempo_en_segundos = $this->api_time_online * 60;
								$horas = floor($tiempo_en_segundos / 3600);
								$minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
								$segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);

								$formato_conexion =   $horas . ':' . $minutos . ":" . $segundos;

							}else 
						$formato_conexion =	$txt_time;
						@endphp

						<b>	<h3 class=""><span class="badge badge-warning">Online {{$formato_conexion}} Min</span></h3></b>
						@else 
						<h3 class=""><span class="badge badge-danger">Off Line</span></h3>
						@endif
						
						<ul class="list-group list-group-flush">
						  <li class="list-group-item"><b>{{ $row->name }} Views({{$this->api_num_viewers}}) 🩲</b></li>
						  <li class="list-group-item">{{$this->api_last_broadcast}}</li>
						</ul>
						<div style="margin-top:-20px;" class="card-body">
						  <b>✌️ Up {{$this->api_votes_up}}</b>
						  <b>😈 Down {{$this->api_votes_down}}</b>
						 <b> <a href="#" class="card-link">⏱️ BBR</a>
						</div>
					  </div>
				</td>
				<td>{{ $row->type }}</td>
				<td>{{ $row->status }}</td>
				<td>{{ $row->estudio->name }}</td>
				<td>
				
					<div style="border:0ch;"  class="card text-center">
						<div class="card-header">
							<strong >
								{{ $row->pagemaster->name }} 
							</strong>
						</div>
						<div style="margin-top:-15px;" class="card-body">
						  <h6 class="card-title">{{$this->apichatur_day}}</h6>
						  <h3>
							  @php
								  $dato =  $this->api_token_balance * 0.05;
							  @endphp
							  ${{$dato}} 
							</h3>
						  <a href="#" style="margin-top:-6px;" class="btn btn-warning shadow-mb"><b> {{ number_format($this->api_token_balance,0)}}/Tokens</b></a>
					</div>
					  </div>
				</td>
				<td width="90">
					<x-BtnActions>
						<x-slot name="id_row">{{$row->id}}</x-slot>
					 </x-BtnActions>
				</td> 
		</tbody>
	</table>						
	{{ $chaturdatas->links() }}
	</div>
				@endforeach

			
				@endif
						
			
				</div>
			</div>
		</div>
	</div>
</div>
