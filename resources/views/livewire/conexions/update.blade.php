<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Conexion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="date"></label>
                <input wire:model="date" type="text" class="form-control" id="date" placeholder="Date">@error('date') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="time_page"></label>
                <input wire:model="time_page" type="text" class="form-control" id="time_page" placeholder="Time Page">@error('time_page') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="time_real"></label>
                <input wire:model="time_real" type="text" class="form-control" id="time_real" placeholder="Time Real">@error('time_real') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="time_min"></label>
                <input wire:model="time_min" type="text" class="form-control" id="time_min" placeholder="Time Min">@error('time_min') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="timebrb"></label>
                <input wire:model="timebrb" type="text" class="form-control" id="timebrb" placeholder="Timebrb">@error('timebrb') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="studio_id"></label>
                <input wire:model="studio_id" type="text" class="form-control" id="studio_id" placeholder="Studio Id">@error('studio_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="model_id"></label>
                <input wire:model="model_id" type="text" class="form-control" id="model_id" placeholder="Model Id">@error('model_id') <span class="error text-danger">{{ $message }}</span> @enderror
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
