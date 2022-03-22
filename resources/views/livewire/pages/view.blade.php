@section('title', __('Pages'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card shadow-lg p-3">
					{{--  componente head --}}
						<x-headform>
								<x-slot name="title">PageStudio </x-slot>
								<x-slot name="title_btn">Crear Page</x-slot>
								<x-slot name="title_input">Busqueda</x-slot>
						</x-headform>

				<div class="card-body">
						@include('livewire.pages.create')
						@include('livewire.pages.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Moneda</th>
								<th>Value</th>
								<th>Link</th>
								<th>Status</th>
								<th>Studio</th>
								<th>Page</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($pages as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->moneda->name  }}</td>
								<td>{{ $row->value }}</td>
								<td>{{ $row->link }}</td>
								<td>{{ $row->status }}</td>
								<td>{{ $row->estudio->name }}</td>
								<td>{{ $row->pagemaster->name }}</td>
								<td width="90">
								<div class="btn-group">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $pages->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
