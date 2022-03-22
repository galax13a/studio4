@section('title', __('Paypages'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
					<x-headform>
							<x-slot name="title">PayModelsPage</x-slot>
							<x-slot name="title_btn">Crear Ahora</x-slot>
							<x-slot name="title_input">Busqueda</x-slot>
					</x-headform>
				
				<div class="card-body">
						@include('livewire.paypages.create')
						@include('livewire.paypages.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Date</th>
								<th>Value</th>
								<th>Studio</th>
								<th>Artist@</th>
								<th>Moneda</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($paypages as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->date }}</td>
								<td>{{ $row->value }}</td>
								<td>{{ $row->estudio->name }}</td>
								<td>{{ $row->modelo->name }}</td>
								<td>{{ $row->moneda->name }}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $paypages->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
