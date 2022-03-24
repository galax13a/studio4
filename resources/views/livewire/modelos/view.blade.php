@section('title', __('Modelos'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
					<x-headform>
							<x-slot name="title">Modelos </x-slot>
							<x-slot name="title_btn">Crear Modelos</x-slot>
							<x-slot name="title_input">Busqueda</x-slot>
					</x-headform>

				<div class="card-body">
						@include('livewire.modelos.create')
						@include('livewire.modelos.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Nick</th>
								<th>Email</th>
								<th>Dni</th>
								<th>Wsp</th>
								<th>Porce</th>
								<th>Typomodel</th>
								<th>Img1</th>
								<th>Img2</th>
								<th>Img3</th>
								<th>Status</th>
								<th>Studio</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($modelos as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->nick }}</td>
								<td>{{ $row->email }}</td>
								<td>{{ $row->dni }}</td>
								<td>{{ $row->wsp }}</td>
								<td>{{ $row->porce }}</td>
								<td>{{ $row->typomodel }}</td>
								<td>{{ $row->img1 }}</td>
								<td>{{ $row->img2 }}</td>
								<td>{{ $row->img3 }}</td>
								<td>{{ $row->status }}</td>
								<td>{{ $row->estudio->name }}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $modelos->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>

</style>