@section('title', __('Dolars'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12 ">
			<div class="card shadow-lg p-3">
			{{--  componente head --}}
				<x-headform>
						<x-slot name="title">Dolar </x-slot>
						<x-slot name="title_btn">Crear Ahora</x-slot>
						<x-slot name="title_input">Busqueda</x-slot>
				</x-headform>
				
				<div class="card-body ">
						@include('livewire.dolars.create')
						@include('livewire.dolars.update')

				<div class="table-responsive">
					<table wire:poll.60s class="table table-bordered table-sm table-dark">
						<thead class="thead">
							<tr> 
								<td></td> 
								<th class="text-center"> 📣 HOY {{$this->fecha}} ::: TRM ::: COP ::::</th>
								<th class="text-center">Trm / Mañana</th>
								<th class="text-center">Date</th>
							
							</tr>
						</thead>
						<tbody>
							@foreach($dolar_fill as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td class="text-center">🤑 <strong> <span class="badge badge-success p-2"> {{ number_format($row->trm, 0) }} </span>  Peso Colombiano</strong></td>
								<td class="bg-dark color-dark text-center font-weight-bold font-italic text-capitalize "> <strong> {{ $row->trm2 }} </strong></td>
								<td class="text-center" >{{ $row->date }}</td>
							
							@endforeach
						</tbody>
					</table>						
					{{ $dolars->links() }}
					</div>
					<hr>

					<div class="table-responsive">
						<table class="table table-bordered table-sm">
							<thead class="thead">
								<tr> 
									<td>#</td> 
									<th class="text-center">Trm / History</th>
									<th class="text-center">Date</th>
									<td>ACTIONS</td>
								</tr>
							</thead>
							<tbody>
								@foreach($dolars as $row)
								<tr>
									<td>{{ $loop->iteration }}</td> 
									<td class="bg-light text-center font-weight-bold font-italic text-capitalize "> <strong> $ {{ number_format($row->trm, 0) }}</strong></td>
								
									<td class="text-center" >{{ $row->date }}</td>
									<td width="90">
										<x-BtnActions>
											<x-slot name="id_row">{{$row->id}}</x-slot>
										 </x-BtnActions>
									</td>
								@endforeach
							</tbody>
						</table>						
						{{ $dolars->links() }}
						</div>
				</div>
			</div>
		</div>
	</div>
</div>
