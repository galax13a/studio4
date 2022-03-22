@section('title', __('Pagemasters'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card shadow-lg p-3">
					{{--  componente head --}}
						<x-headform>
								<x-slot name="title">PageMaster </x-slot>
								<x-slot name="title_btn">Crear Page</x-slot>
								<x-slot name="title_input">Busqueda</x-slot>
						</x-headform>
				
				<div class="card-body">
						@include('livewire.pagemasters.create')
						@include('livewire.pagemasters.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Link</th>
								<th>Logo</th>
								<th>Status</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($pagemasters as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->link }}</td>
								<td>{{ $row->logo }}</td>
								<td>{{ $row->status }}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $pagemasters->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
