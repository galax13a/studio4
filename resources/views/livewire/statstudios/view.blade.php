@section('title', __('Statstudios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
				<x-headform>
					<x-slot name="title">stat studio</x-slot>
					<x-slot name="title_btn">Crear stat</x-slot>
					<x-slot name="title_input">Busqueda</x-slot>
			</x-headform>
				
				<div class="card-body">
						@include('livewire.statstudios.create')
						@include('livewire.statstudios.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Date</th>
								<th>Date Ini</th>
								<th>Date Finish</th>
								<th>Payout</th>
								<th>Status</th>
								<th>Program</th>
								<th>Studio</th>
								<th>Page</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($statstudios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->date }}</td>
								<td>{{ $row->date_ini }}</td>
								<td>{{ $row->date_finish }}</td>
								<td>{{ $row->payout }}</td>
								<td>{{ $row->status }}</td>
								<td>{{ $row->program }}</td>
								<td>{{ $row->estudio->name }}</td>
								<td>{{ $row->page->name }}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $statstudios->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
