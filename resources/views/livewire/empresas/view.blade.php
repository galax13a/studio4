@section('title', __('Empresas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card shadow-lg p-3">
					{{--  componente head --}}
						<x-headform>
								<x-slot name="title">Empresas</x-slot>
								<x-slot name="title_btn">Crear Empresa</x-slot>
								<x-slot name="title_input">Busqueda</x-slot>
						</x-headform>
				
				<div class="card-body">
						@include('livewire.empresas.create')
						@include('livewire.empresas.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Nit</th>
								<th>Dir</th>
								<th>Tel</th>
								<th>Logo</th>
								<th>Email</th>
								<th>Wsp1</th>
								<th>Pagina</th>
								<th>Status</th>
								<th>User Root</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($empresas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->nit }}</td>
								<td>{{ $row->dir }}</td>
								<td>{{ $row->tel }}</td>
								<td>{{ $row->logo }}</td>
								<td>{{ $row->email }}</td>
								<td>{{ $row->wsp1 }}</td>
								<td>{{ $row->pagina }}</td>
								<td>{{ $row->status }}</td>
								<td>{{ $row->user->name }}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $empresas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
