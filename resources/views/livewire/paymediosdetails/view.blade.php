@section('title', __('Paymediosdetails'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
			
				<x-headform>
						<x-slot name="title">MediosPagos </x-slot>
						<x-slot name="title_btn">New </x-slot>
						<x-slot name="title_input">Busqueda</x-slot>
				</x-headform>
				
				<div class="card-body">
						@include('livewire.paymediosdetails.create')
						@include('livewire.paymediosdetails.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Status</th>
								<th>Studio</th>
								<th>Model</th>
								<th>Paymedio</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($paymediosdetails as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->status }}</td>
								<td>
									@if (!is_null($row->estudio))
									{{ $row->estudio->name }}
									@else  <b>Model PayMedio</b>
									@endif
									
								
								</td>
								<td>{{ $row->modelo->name }}</td>
								<td>{{ $row->paymedio->name }}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $paymediosdetails->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
