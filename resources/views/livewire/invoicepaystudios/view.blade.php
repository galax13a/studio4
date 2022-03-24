@section('title', __('Invoicepaystudios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card shadow-lg p-3">
				{{--  componente head --}}
				<x-headform>
					<x-slot name="title">InvoiceStudio</x-slot>
					<x-slot name="title_btn">New</x-slot>
					<x-slot name="title_input">Busqueda</x-slot>
			</x-headform>
				
				<div class="card-body">
						@include('livewire.invoicepaystudios.create')
						@include('livewire.invoicepaystudios.update')
				<div class="table-responsive ">
					<table class="table table table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Name</th>
								<th>Date</th>
								<th>Payout</th>
								<th>Dolar</th>
								<th>Dolar Ope</th>
								<th>Dolar Pay</th>
								<th>Iva</th>
								<th>Pdf/Img</th>
								<th>Studio</th>
								<th>Contable</th>
								<th>Moneda</th>
								<th>Monetizador</th>
								<th>Paystudio</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($invoicepaystudios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->date }}</td>
								<td>{{ $row->payout }}</td>
								<td>{{ $row->dolar_value }}</td>
								<td>{{ $row->dolar_oficial }}</td>
								<td>{{ $row->dolar_pagado }}</td>
								<td>{{ $row->iva }}</td>
							
								<td>
									<x-btnicon >
										<x-slot name="icon" >
											<div class="btn-group  btn-group-toggle" data-toggle="buttons">
												<label class="btn btn-warning active">
												  <input type="radio" name="options" id="option1" autocomplete="off" checked> 
												  <i class="fa-solid fa-file-pdf "></i>
												</label>
												<label class="btn btn-dark">
												  <input type="radio" name="options" id="option2" autocomplete="off"> 
												  <i class="fa-solid fa-file-circle-plus "></i>

												</label>
												<label class="btn btn-dark">
												  <input type="radio" name="options" id="option3" autocomplete="off"> 
												  <i class="fa-solid fa-image"></i>
												</label>
											  </div>
										</x-slot>
									</x-btnicon>
									
								</i>
								</td>
								<td>{{ $row->estudio->name }}</td>
								<td>{{ $row->contable->name }}</td>
								<td>{{ $row->moneda->name }}</td>
								<td>{{ $row->monetizadore->name }}</td>
								<td>{{ $row->estudio->name }}</td>
								<td width="90">
									<x-BtnActions>
										<x-slot name="id_row">{{$row->id}}</x-slot>
									 </x-BtnActions>
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $invoicepaystudios->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
