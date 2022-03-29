<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Modelo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                id : {{	$this->id_table }}
                /update :  {{$this->seleccion_col}}
               {{$this->selected_id}}
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="name">Name</label>
                <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="nick">Nick</label>
                <input wire:model="nick" type="text" class="form-control" id="nick" placeholder="Nick">@error('nick') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="dni">DNI</label>
                <input wire:model="dni" type="text" class="form-control" id="dni" placeholder="Dni">@error('dni') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="wsp">wsp</label>
                <input wire:model="wsp" type="text" class="form-control" id="wsp" placeholder="Wsp">@error('wsp') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="porce">Porce</label>
                <input wire:model="porce" type="text" class="form-control" id="porce" placeholder="Porce">@error('porce') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="typomodel">Tipo Modelo</label>
                <input wire:model="typomodel" type="text" class="form-control" id="typomodel" placeholder="Typomodel">@error('typomodel') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="img1"></label>
                <input wire:model="img1" type="text" class="form-control" id="img1" placeholder="Img1">@error('img1') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="img2"></label>
                <input wire:model="img2" type="text" class="form-control" id="img2" placeholder="Img2">@error('img2') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="img3"></label>
                <input wire:model="img3" type="text" class="form-control" id="img3" placeholder="Img3">@error('img3') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="status">-Status</label>
                <input wire:model="status" type="text" class="form-control" id="status" placeholder="Status">@error('status') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="studio_id">Studio</label>
                <input wire:model="studio_id" type="text" class="form-control" id="studio_id" placeholder="Studio Id">@error('studio_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div>
