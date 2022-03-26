@section('title', __('Paystudios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
				<x-headform>
					<x-slot name="title">Paystudio</x-slot>
					<x-slot name="title_btn">New</x-slot>
					<x-slot name="title_input">Busqueda</x-slot>
			</x-headform>
				
				<div class="card-body">
						@include('livewire.paystudios.create')
						@include('livewire.paystudios.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Date</th>
								<th>Num</th>
								<th>Data1</th>
								<th>Data2</th>
								<th>Date Ini</th>
								<th>Date Finish</th>
								<th>Payout</th>
								<th>Status</th>
								<th>Program</th>
								<th>Studio</th>
								<th>Page</th>
								<th>MedioPay</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($paystudios as $row)
						
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->date }}</td>
								<td>{{ $row->num }}</td>
								<td>{{ $row->data1 }}</td>
								<td>{{ $row->data2 }}</td>
								<td>{{ $row->date_ini }}</td>
								<td>{{ $row->date_finish }}</td>
								<td>{{ $row->payout }}</td>
								<td>{{ $row->status }}</td>
								<td>{{ $row->program }}</td>
								<td>{{ $row->studio_id }}</td>
								<td>{{ $row->page_id }}</td>
								<td>{{ $row->medio->name}}</td>
					
								<td width="90">
							
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $paystudios->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
