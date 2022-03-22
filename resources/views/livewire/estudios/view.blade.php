@section('title', __('Estudios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card shadow-lg p-3">
					{{--  componente head --}}
						<x-headform>
								<x-slot name="title">Studios</x-slot>
								<x-slot name="title_btn">Crear Studio</x-slot>
								<x-slot name="title_input">Busqueda</x-slot>
						</x-headform>
					
				<div class="card-body">
						@include('livewire.estudios.create')
						@include('livewire.estudios.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Ciudad</th>
								<th>Dir</th>
								<th>Empresa Id</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($estudios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->ciudad }}</td>
								<td>{{ $row->dir }}</td>
								<td>{{ $row->empresa->name }}</td>
								<td width="90">
								 <x-BtnActions>
									<x-slot name="id_row">{{$row->id}}</x-slot>
								 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $estudios->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
