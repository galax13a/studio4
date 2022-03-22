@section('title', __('Chaturstatstudios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
				<x-headform>
					<x-slot name="title">StatCB</x-slot>
					<x-slot name="title_btn">Crear Nuevo</x-slot>
					<x-slot name="title_input">Busqueda</x-slot>
			</x-headform>
			
			@foreach ($apichatur_range as $api)
				{{$api}}
			@endforeach

			<br>
			----------------------------------------------------------------
			{{$apichatur_day}}
			<br>
			----------------------------------------------------------------
			{{$apichatur_tks}}
			<br>
			----------------------------------------------------------------
			{{$apichatur_payout}}

				<div class="card-body">
						@include('livewire.chaturstatstudios.create')
						@include('livewire.chaturstatstudios.update')
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
								<th>Studio Id</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($chaturstatstudios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->date }}</td>
								<td>{{ $row->date_ini }}</td>
								<td>{{ $row->date_finish }}</td>
								<td>{{ $row->payout }}</td>
								<td>{{ $row->status }}</td>
								<td>{{ $row->program }}</td>
								<td>{{ $row->studio_id }}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $chaturstatstudios->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
