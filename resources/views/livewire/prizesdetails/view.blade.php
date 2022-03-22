@section('title', __('Prizesdetails'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
					<x-headform>
							<x-slot name="title">Prize Ganador! </x-slot>
							<x-slot name="title_btn">New Ganador</x-slot>
							<x-slot name="title_input">Busqueda</x-slot>
					</x-headform>
				
				<div class="card-body">
						@include('livewire.prizesdetails.create')
						@include('livewire.prizesdetails.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nota</th>
								<th>Date</th>
								<th>Studio</th>
								<th>Model</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($prizesdetails as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->nota }}</td>
								<td>{{ $row->date }}</td>
								<td>{{ $row->estudio->name }}</td>
								<td>{{ $row->modelo->name}}</td>
								<td width="90">
								<div class="btn-group">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $prizesdetails->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
