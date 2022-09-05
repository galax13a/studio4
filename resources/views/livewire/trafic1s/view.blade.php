@section('title', __('Trafic1s'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				
				<div class="container">
					<div class="row">
					  <div class="col-sm">
						<div id="form_datos">
							
								<div class="form-group">
									<label for="name">#.Views </label>
									<input  type="text"  value="26" class="form-control" id="timex" placeholder="timex">@error('timex') <span class="error text-danger">{{ $message }}</span> @enderror
								</div>
								<div class="form-group">
									<label for="name">Min Close Room </label>
									<input  type="text" value="1" class="form-control" id="min_close" placeholder="min_close">@error('min_close') <span class="error text-danger">{{ $message }}</span> @enderror
								</div>
						
							
							S.Wns : <input type="text" name="time_traficc" id="time_traficc" value="0.30" max="10" size="2">
							S.Wns : <input type="text" name="star_trafic" id="star_trafic" value="0" max="10" size="2">
						
					
							<label class="bg-warning p-2 m-2 rounded" for="basic-url">Trafic Room ❤️</label>
								<div class="input-group mb-3 ">
								<div class="input-group-prepend ">
									<span class="input-group-text bg-light" id="basic-addon3">https://chaturbate.com/</span>
								</div>
								<input type="text" id="rom_nick" name="rom_nick" class="form-control"  aria-describedby="basic-addon3">
								</div>

						</div>
					  </div>
					 
					 <div class="col-sm" >
						<div class="container d-flex justify-content-center mt-5">
							<div class="card">
								<div class="top-container m-2 p-2"> <img  id="img_profile" src="https://roomimg.stream.highwebmedia.com/riw/velvetsugar3.jpg" class="img-fluid profile-image" width="120">
									<div class="ml-3">
										<h5 id="title_name" class="name">XxX</h5>
										<p class="mail">Chaturbate.com</p>
									</div>
								</div>
							
								<div class="recent-border mt-4 ml-2"> <span class="recent-orders">Recent photos</span> </div>
								<div class="wishlist-border pt-2 ml-2"> <span class="wishlist">Wishlist</span> </div>
								<div class="fashion-studio-border pt-2 ml-2 mb-2"> <span id="fashion_rom" class="fashion-studio">Fashion studio</span> </div>
							</div>
						</div>
					 </div>
					  <div class="col-sm">
						<h3> -trafic1 v 1.0</h3> <button id="btntrafic" class="btn btn-dark"type="button">Trafic start</button>
						<h3> -stop rooms</h3> <button id="btntrafic_stop" class="btn btn-success"type="button">Trafic stop</button>  
					</div>
					</div>
				  </div>

				<div class="card-body">
						@include('livewire.trafic1s.create')
						@include('livewire.trafic1s.update')
				<div class="table-responsive">
					<table id="tabla1" class="table table-bordered table-sm">
						<thead class="thead">
							<tr > 
								<td>#</td> 
								<th>Url</th>
								<th>Pagui</th>
								<th>Status</th>
								<th>Page Id</th>
								<th>Tiposala</th>
							
							</tr>
						</thead>
						<tbody>
							@foreach($trafic1s as $row)
							<tr class="bg-dark">
								<td>{{ $loop->iteration }}</td> 
								<td class=" text-success">{{ $row->url }}</td>
								<td>{{ $row->pagui }}</td>
							
								<td>{{ $row->status }}</td>
								<td>{{ $row->page_id }}</td>
								<td class=" text-success">{{ $row->tiposala }}</td>
								
								</td>
							@endforeach
						</tbody>
					</table>						
					{{ $trafic1s->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>

document.addEventListener('livewire:load', function() {

	

	$(document).ready(function() {
        let seg_tab2 = 2000;
		let url_photo = "https://roomimg.stream.highwebmedia.com/riw/"
		let sala = 11;
        let timex = 5000;
        let contador = 1;
		let con_global = 1;
		let stoper = "start";
		let close_win = 360000;
       
	 $("#btntrafic_stop").prop("disabled", true);

    function pintar1(sala, contador) {
		//console.log("varua / " + stoper);
            if(contador > sala || stoper === "stop") {
               // console.log("Termino Proceso");

            }else{
                console.log("pintando :" + contador)
				i = contador
				let celda = document.querySelector(`#tabla1 > tbody > tr:nth-child(${i})`);
				celda.className = "bg-primary";
				let link = document.querySelector(`#tabla1 > tbody > tr:nth-child(${i}) > td:nth-child(2)`).innerText;
				let item2 = document.querySelector(`#tabla1 > tbody > tr:nth-child(${i}) > td:nth-child(2)`);
				item2.className = "bg-warning";
				item3 = document.querySelector(`#tabla1 > tbody > tr:nth-child(${i}) > td:nth-child(6)`)
                item3.innerHTML = "<b>Go Room...</b>"
				item3.className = "bg-light";

				//document.getElementById("img1").src= url_photo + ".jpg";
				var miCadena = link;
				var divisiones = miCadena.split("/");
				let nicky  =  divisiones[3]

				$("#img_profile").attr("src", url_photo + nicky + ".jpg");
				$("#title_name").html(`<b>${nicky}</b>`)
				$("#rom_nick").val(nicky);
				$("#room_nick").addClass("bg-dark");
				$("#fashion_rom").html(`<b> 🔥 Views : ${contador}</b>`)

				setTimeout(function () {
                    pintar1(sala,contador)
                },timex,"Javascript")
                contador = contador+1
				con_global = contador
				page = link

				// abre las salas 
				
				var mywin = window.open(page, '_blank');
					setTimeout(function() {
					mywin.close();
					}, close_win);
					
				
            }
        }

		function pintar2 (sala,contador) {
           // console.log("go to : "+sala)
            setTimeout(function () {
                pintar1(sala, contador)
            },timex,"Javascript");
        }

	$("#btntrafic_stop").on("click", function(){ 
  		
		//alert("Stop");
		$("#btntrafic").removeAttr('disabled');
		$("#btntrafic_stop").prop("disabled", true);
		//alert("contador global : " + con_global);
		stoper = "stop"
		
		console.log(stoper);
		  
	  });

	$("#btntrafic").on("click", function(){ 
		stoper = "star"
		//alert("contador de starcho : " + contador);
		$("#btntrafic").prop("disabled", true);
		$("#btntrafic_stop").prop("disabled", false);
		var nFilas = $("#tabla1 tr").length-1;

		if(con_global > contador) {
			pintar2(nFilas,con_global)
		}else pintar2(nFilas,contador)

		
		
	});

		var table = $("#tabla1").DataTable({
								paging: false,
								searching: false,
								retrieve: true,
								responsive:false,
								autoWidth:false
							});


	});

});
	</script>

	<style>
	
.top-container {
    display: flex;
    align-items: center
}

.profile-image {
    border-radius: 10px;
    border: 2px solid #5957f9
}

.name {
    font-size: 15px;
    font-weight: bold;
    color: #272727;
    position: relative;
    top: 8px
}

.mail {
    font-size: 14px;
    color: grey;
    position: relative;
    top: 2px
}

.middle-container {
    background-color: #eee;
    border-radius: 12px
}

.middle-container:hover {
    border: 1px solid #5957f9
}

.dollar-div {
    background-color: #5957f9;
    padding: 12px;
    border-radius: 10px
}

.round-div {
    border-radius: 50%;
    width: 35px;
    height: 35px;
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center
}

.dollar {
    font-size: 16px !important;
    color: #5957f9 !important;
    font-weight: bold !important
}

.current-balance {
    font-size: 15px;
    color: #272727;
    font-weight: bold
}

.amount {
    color: #5957f9;
    font-size: 16px;
    font-weight: bold
}

.dollar-sign {
    font-size: 16px;
    color: #272727;
    font-weight: bold
}

.recent-border {
    border-left: 2px solid #5957f9;
    display: flex;
    align-items: center
}

.recent-border:hover {
    border-bottom: 1px solid #dee2e6 !important
}

.recent-orders {
    font-size: 16px;
    font-weight: 700;
    color: #5957f9;
    margin-left: 2px
}

.wishlist {
    font-size: 16px;
    font-weight: 700;
    color: #272727
}

.wishlist-border:hover {
    border-bottom: 1px solid #dee2e6 !important
}

.fashion-studio {
    font-size: 16px;
    font-weight: 700;
    color: #272727
}

.fashion-studio-border:hover {
    border-bottom: 1px solid #dee2e6 !important
}
	</style>

</div>
