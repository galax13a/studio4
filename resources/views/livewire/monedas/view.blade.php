@section('title', __('Monedas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
					<x-headform>
							<x-slot name="title">Monedas</x-slot>
							<x-slot name="title_btn">Crear Ahora</x-slot>
							<x-slot name="title_input">Busqueda</x-slot>
					</x-headform>
				
				<div class="card-body">
						@include('livewire.monedas.create')
						@include('livewire.monedas.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Status</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($monedas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->status }}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $monedas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
