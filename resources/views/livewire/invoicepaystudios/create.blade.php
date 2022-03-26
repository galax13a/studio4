<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Invoicepaystudio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="name"></label>
                <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="date"></label>
                <input wire:model="date" type="text" class="form-control" id="date" placeholder="Date">@error('date') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="payout"></label>
                <input wire:model="payout" type="text" class="form-control" id="payout" placeholder="Payout">@error('payout') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="dolar_value"></label>
                <input wire:model="dolar_value" type="text" class="form-control" id="dolar_value" placeholder="Dolar Value">@error('dolar_value') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="dolar_oficial"></label>
                <input wire:model="dolar_oficial" type="text" class="form-control" id="dolar_oficial" placeholder="Dolar Oficial">@error('dolar_oficial') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="dolar_pagado"></label>
                <input wire:model="dolar_pagado" type="text" class="form-control" id="dolar_pagado" placeholder="Dolar Pagado">@error('dolar_pagado') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="iva"></label>
                <input wire:model="iva" type="text" class="form-control" id="iva" placeholder="Iva">@error('iva') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="status"></label>
                <input wire:model="status" type="text" class="form-control" id="status" placeholder="Status">@error('status') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="img_studio"></label>
                <input wire:model="img_studio" type="text" class="form-control" id="img_studio" placeholder="Img Studio">@error('img_studio') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="img_payment"></label>
                <input wire:model="img_payment" type="text" class="form-control" id="img_payment" placeholder="Img Payment">@error('img_payment') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="datax"></label>
                <input wire:model="datax" type="text" class="form-control" id="datax" placeholder="Datax">@error('datax') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="studio_id"></label>
                <input wire:model="studio_id" type="text" class="form-control" id="studio_id" placeholder="Studio Id">@error('studio_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="contable_id"></label>
                <input wire:model="contable_id" type="text" class="form-control" id="contable_id" placeholder="Contable Id">@error('contable_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="moneda_id"></label>
                <input wire:model="moneda_id" type="text" class="form-control" id="moneda_id" placeholder="Moneda Id">@error('moneda_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="monetizador_id"></label>
                <input wire:model="monetizador_id" type="text" class="form-control" id="monetizador_id" placeholder="Monetizador Id">@error('monetizador_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="paystudio_id"></label>
                <input wire:model="paystudio_id" type="text" class="form-control" id="paystudio_id" placeholder="Paystudio Id">@error('paystudio_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="empresa_id">empresa</label>
                <input wire:model="empresa_id" type="text" class="form-control" id="empresa_id" placeholder="empresa Id">@error('empresa_id') <span class="error text-danger">{{ $message }}</span> @enderror
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
