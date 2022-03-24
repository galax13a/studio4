@section('title', __('Contables'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
					<x-headform>
							<x-slot name="title">Contables </x-slot>
							<x-slot name="title_btn">New </x-slot>
							<x-slot name="title_input">Busqueda</x-slot>
					</x-headform>
				
				<div class="card-body">
						@include('livewire.contables.create')
						@include('livewire.contables.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Value</th>
								<th>Status</th>
								<th>Code</th>
								<th>Datax</th>
								<th>business</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($contables as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->value }}</td>
								<td>{{ $row->status }}</td>
								<td>{{ $row->codemaster }}</td>
								<td>{{ $row->datax }}</td>
								<td>{{ $row->empresa->name}}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $contables->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
