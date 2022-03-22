<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Dolar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="trm"></label>
                <input wire:model="trm" type="text" class="form-control" id="trm" placeholder="Trm">@error('trm') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="trm2"></label>
                <input wire:model="trm2" type="text" class="form-control" id="trm2" placeholder="Trm2">@error('trm2') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="date"></label>
                <input wire:model="date" type="text" class="form-control" id="date" placeholder="Date">@error('date') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <x-btn_popup>
					<x-slot name="title_btn">Actualizar</x-slot>
                    <x-slot name="mode">1</x-slot>
				</x-btn_popup>   
            </div>
       </div>
    </div>
</div>
