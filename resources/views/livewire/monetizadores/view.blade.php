@section('title', __('Monetizadores'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
					<x-headform>
							<x-slot name="title">Monetizadores </x-slot>
							<x-slot name="title_btn">New </x-slot>
							<x-slot name="title_input">Busqueda</x-slot>
					</x-headform>
				
				<div class="card-body">
						@include('livewire.monetizadores.create')
						@include('livewire.monetizadores.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Pagina</th>
								<th>Contact</th>
								<th>Email</th>
								<th>Porce</th>
								<th>Status</th>
								<th>Datax</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($monetizadores as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->pagina }}</td>
								<td>{{ $row->contact }}</td>
								<td>{{ $row->email }}</td>
								<td>{{ $row->porce }}</td>
								<td>{{ $row->status }}</td>
								<td>{{ $row->datax }}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $monetizadores->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
