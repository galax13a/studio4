<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Statstudio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="date"></label>
                <input wire:model="date" type="text" class="form-control" id="date" placeholder="Date">@error('date') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="date_ini"></label>
                <input wire:model="date_ini" type="text" class="form-control" id="date_ini" placeholder="Date Ini">@error('date_ini') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="date_finish"></label>
                <input wire:model="date_finish" type="text" class="form-control" id="date_finish" placeholder="Date Finish">@error('date_finish') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="payout"></label>
                <input wire:model="payout" type="text" class="form-control" id="payout" placeholder="Payout">@error('payout') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="status"></label>
                <input wire:model="status" type="text" class="form-control" id="status" placeholder="Status">@error('status') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="program"></label>
                <input wire:model="program" type="text" class="form-control" id="program" placeholder="Program">@error('program') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="studio_id"></label>
                <input wire:model="studio_id" type="text" class="form-control" id="studio_id" placeholder="Studio Id">@error('studio_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="page_id"></label>
                <input wire:model="page_id" type="text" class="form-control" id="page_id" placeholder="Page Id">@error('page_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
