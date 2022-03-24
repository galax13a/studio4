@section('title', __('Contablestudios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
					<x-headform>
							<x-slot name="title">Contable Details </x-slot>
							<x-slot name="title_btn">New </x-slot>
							<x-slot name="title_input">Busqueda</x-slot>
					</x-headform>
				
				<div class="card-body">
						@include('livewire.contablestudios.create')
						@include('livewire.contablestudios.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Value</th>
								<th>Status</th>
								<th>Sub-Contable</th>
								<th>Datax</th>
								<th>Studio</th>
								<th>Contable</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($contablestudios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->value }}</td>
								<td>{{ $row->status }}</td>
								<td>{{ $row->codesubmaster }}</td>
								<td>{{ $row->datax }}</td>
								<td>{{ $row->estudio->name }}</td>
								<td>{{ $row->contable->name }}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $contablestudios->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
