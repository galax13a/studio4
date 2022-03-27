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
					<table id="{{$this->id_table }}" class="table table-sm">
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
								<th>Status</th>
								<th>Studio</th>
								<td>data</td>
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

		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-10 col-xl-8 mx-auto">
					<h2 class="h3 mb-4 page-title">Settings</h2>
					<div class="my-4">
						<ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Notifications</a>
							</li>
						</ul>
						<h5 class="mb-0 mt-5">Notifications Settings</h5>
						<p>Select notification you want to receive</p>
						<hr class="my-4" />
						<strong class="mb-0">Security</strong>
						<p>Control security alert you will be notified.</p>
						<div class="list-group mb-5 shadow">
							<div class="list-group-item">
								<div class="row align-items-center">
									<div class="col">
										<strong class="mb-0">Unusual activity notifications</strong>
										<p class="text-muted mb-0">Donec in quam sed urna bibendum tincidunt quis mollis mauris.</p>
									</div>
									<div class="col-auto">
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="alert1" checked="" />
											<span class="custom-control-label"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="list-group-item">
								<div class="row align-items-center">
									<div class="col">
										<strong class="mb-0">Unauthorized financial activity</strong>
										<p class="text-muted mb-0">Fusce lacinia elementum eros, sed vulputate urna eleifend nec.</p>
									</div>
									<div class="col-auto">
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="alert2" />
											<span class="custom-control-label"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr class="my-4" />
						<strong class="mb-0">System</strong>
						<p>Please enable system alert you will get.</p>
						<div class="list-group mb-5 shadow">
							<div class="list-group-item">
								<div class="row align-items-center">
									<div class="col">
										<strong class="mb-0">Notify me about new features and updates</strong>
										<p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
									</div>
									<div class="col-auto">
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="alert3" checked="" />
											<span class="custom-control-label"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="list-group-item">
								<div class="row align-items-center">
									<div class="col">
										<strong class="mb-0">Notify me by email for latest news</strong>
										<p class="text-muted mb-0">Nulla et tincidunt sapien. Sed eleifend volutpat elementum.</p>
									</div>
									<div class="col-auto">
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="alert4" checked="" />
											<span class="custom-control-label"></span>
										</div>
									</div>
								</div>
							</div>
							<div class="list-group-item">
								<div class="row align-items-center">
									<div class="col">
										<strong class="mb-0">Notify me about tips on using account</strong>
										<p class="text-muted mb-0">Donec in quam sed urna bibendum tincidunt quis mollis mauris.</p>
									</div>
									<div class="col-auto">
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="alert5" />
											<span class="custom-control-label"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			</div>

	</div>

<script>
/*
$("{{$this->id_table }}").DataTable({
             paging: false,
             searching: true,
            retrieve: true,
            responsive:true,
            autoWidth:false
         });
		 */
 document.addEventListener('livewire:load', function() {

			$(document).ready(function() {
						//alert('cargado')
						$("#{{$this->id_table }}").DataTable({
								paging: false,
								searching: true,
								retrieve: true,
								responsive:true,
								autoWidth:false, 
								dom: 'Bfrtip',
								buttons: [
									'copy', 'csv', 'excel', 'pdf', 'print'
								]
							});
		});
		

				

		});


</script>

</div>

