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

						@if ($this->pdfbtn )
						<button  onclick="print()" class="btn btn-primary text-sm-right"type="button"><i wire.click="pdf" class="fa-solid fa-file-pdf mr-2 "></i>Print PDF</button>
	
						<div id="pdfexport1">
						@include('livewire.invoicepaystudios.pdf')
						</div>
					
					</div>
					@endif

				<div class="table-responsive " id="export3" name="export3">
					<table class="table table table-sm" >
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Paystudio</th>
								<th>Des</th>
								<th>Date</th>
								<th>Total</th>
								<th>USD/EU</th>
								<th>Dolar.O</th>
								<th>Dolar.P</th>
								<th>Iva</th>
								<th>Pdf/Img</th>
								<th>Studio</th>
								<th>Contable</th>
								<th>Moneda</th>
								<th>Studio</th>
							
								<td>cmd</td>
							</tr>
						</thead>
						<tbody>
							@foreach($invoicepaystudios as $row)
							<tr>
								<td>
									ID  {{ $row->paystudio->id }}/
									Num {{ $row->paystudio->num }}
								/ empresa / {{$row->empresa->name }}
								</td> 
								<td>{{ $row->monetizadore->name}}/{{$row->monetizadore->nit }}</td>
								<td>{{ $row->name }} / {{ $row->paystudio->program }}</td>
								<td>{{ $row->date }}</td>
								<td>{{ $row->paystudio->payout }}</td>
								<td>{{ $row->dolar_value }}</td>
								<td>{{ $row->dolar_oficial }}</td>
								<td>{{ $row->dolar_pagado }}</td>
								<td>{{ $row->iva }}</td>
							
								<td>
									<x-btnicon >
										<x-slot name="icon" >
											<label wire:click.prevent="pdf({{$row}})" class="btn btn-dark active">
											<input  type="radio" name="options" id="option1" autocomplete="off" checked> 
											<i  class="fa-solid fa-file-pdf mr-2 "></i>
										</label>
										<label class="btn btn-dark active">
											<input type="radio" name="options" id="option2" autocomplete="off" checked> 
											<i class="fa-solid fa-file-circle-plus mr-1 "></i>
										</label>
										<label class="btn btn-dark active">
											<input type="radio" name="options" id="option3" autocomplete="off" checked> 
											<i class="fa-solid fa-image"></i>
										</label>
											
										</x-slot>
									</x-btnicon>
									
								</i>
								</td>
								<td>{{ $row->estudio->name }} </td>
								<td>{{ $row->contable->name }}</td>
								<td>{{ $row->moneda->name }} / 
								.....	{{ $row["paystudio"]["medio_id"] }} / 
									medix **
									****{{ $row->paystudio->name
									 }}
									 ****medio
									
								</td>
							
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

<script>

	function print(){
	var ficha = document.getElementById("pdfexport1");
	  var ventimp = window.open(' ', 'popimpr');
	  ventimp.document.write( ficha.innerHTML );
	  ventimp.document.close();
	  ventimp.print( );
	  ventimp.close();
	}

</script>