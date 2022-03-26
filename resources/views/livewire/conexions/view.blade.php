<div id="fluidiv" class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
			{{--  componente head --}}
			<x-headform>
				<x-slot name="title">Conexion</x-slot>
				<x-slot name="title_btn">Crear Nuevo</x-slot>
				<x-slot name="title_input">Busqueda</x-slot>
		</x-headform>
				
				<div class="card-body">
						@include('livewire.conexions.create')
						@include('livewire.conexions.update')
				<div class="table-responsive">
					<table  id="tablaxxx" class="table table-spriped ">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Date</th>
								<th>Time Page</th>
								<th>Time Real</th>
								<th>Time Min</th>
								<th>Timebrb</th>
								<th>Studio</th>
								<th>Model</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($conexions as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->date }}</td>
								<td>{{ $row->time_page }}</td>
								<td>{{ $row->time_real }}</td>
								<td>{{ $row->time_min }}</td>
								<td>{{ $row->timebrb }}</td>
								<td>{{ $row->estudio->name }}</td>
								<td>{{ $row->modelo->name }}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $conexions->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
