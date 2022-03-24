@section('title', __('Paymedios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
					<x-headform>
							<x-slot name="title">PayMedios </x-slot>
							<x-slot name="title_btn">New </x-slot>
							<x-slot name="title_input">Busqueda</x-slot>
					</x-headform>
				
				<div class="card-body">
						@include('livewire.paymedios.create')
						@include('livewire.paymedios.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Datax</th>
								<th>Studio</th>
								<th>Currency</th>
								<th>Status</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($paymedios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->datax }}</td>
								<td>{{ $row->estudio->name }}</td>
								<td>{{ $row->moneda->name }}</td>
								<td>{{ $row->status }}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $paymedios->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
