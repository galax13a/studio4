<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Invoicepaystudio;

class Invoicepaystudios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $date, $payout, $dolar_value, $dolar_oficial, $dolar_pagado, $iva, $status, $img_studio, $img_payment, $datax, $studio_id, $contable_id, $moneda_id, $monetizador_id, $paystudio_id;
    public $updateMode = false;
	public $pdfbtn = false;
	
	public $id_invoices;
		
	public function mount($id_invoices= null) {
		$this->id_invoices = $id_invoices;
		$this->pdfbtn = true;
	}

	public function pdf($id=null) {
		$this->pdfbtn = "entro expor archivo";
	}

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.invoicepaystudios.view', [
            'invoicepaystudios' => Invoicepaystudio::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('date', 'LIKE', $keyWord)
						->orWhere('payout', 'LIKE', $keyWord)
						->orWhere('dolar_value', 'LIKE', $keyWord)
						->orWhere('dolar_oficial', 'LIKE', $keyWord)
						->orWhere('dolar_pagado', 'LIKE', $keyWord)
						->orWhere('iva', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('img_studio', 'LIKE', $keyWord)
						->orWhere('img_payment', 'LIKE', $keyWord)
						->orWhere('datax', 'LIKE', $keyWord)
						->orWhere('studio_id', 'LIKE', $keyWord)
						->orWhere('contable_id', 'LIKE', $keyWord)
						->orWhere('moneda_id', 'LIKE', $keyWord)
						->orWhere('monetizador_id', 'LIKE', $keyWord)
						->orWhere('paystudio_id', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }


    private function resetInput()
    {		
		$this->name = null;
		$this->date = null;
		$this->payout = null;
		$this->dolar_value = null;
		$this->dolar_oficial = null;
		$this->dolar_pagado = null;
		$this->iva = null;
		$this->status = null;
		$this->img_studio = null;
		$this->img_payment = null;
		$this->datax = null;
		$this->studio_id = null;
		$this->contable_id = null;
		$this->moneda_id = null;
		$this->monetizador_id = null;
		$this->paystudio_id = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'date' => 'required',
		'payout' => 'required',
		'dolar_value' => 'required',
		'moneda_id' => 'required',
		'paystudio_id' => 'required',
        ]);

        Invoicepaystudio::create([ 
			'name' => $this-> name,
			'date' => $this-> date,
			'payout' => $this-> payout,
			'dolar_value' => $this-> dolar_value,
			'dolar_oficial' => $this-> dolar_oficial,
			'dolar_pagado' => $this-> dolar_pagado,
			'iva' => $this-> iva,
			'status' => $this-> status,
			'img_studio' => $this-> img_studio,
			'img_payment' => $this-> img_payment,
			'datax' => $this-> datax,
			'studio_id' => $this-> studio_id,
			'contable_id' => $this-> contable_id,
			'moneda_id' => $this-> moneda_id,
			'monetizador_id' => $this-> monetizador_id,
			'paystudio_id' => $this-> paystudio_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Invoicepaystudio Successfully created.');
    }

    public function edit($id)
    {
        $record = Invoicepaystudio::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->date = $record-> date;
		$this->payout = $record-> payout;
		$this->dolar_value = $record-> dolar_value;
		$this->dolar_oficial = $record-> dolar_oficial;
		$this->dolar_pagado = $record-> dolar_pagado;
		$this->iva = $record-> iva;
		$this->status = $record-> status;
		$this->img_studio = $record-> img_studio;
		$this->img_payment = $record-> img_payment;
		$this->datax = $record-> datax;
		$this->studio_id = $record-> studio_id;
		$this->contable_id = $record-> contable_id;
		$this->moneda_id = $record-> moneda_id;
		$this->monetizador_id = $record-> monetizador_id;
		$this->paystudio_id = $record-> paystudio_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'date' => 'required',
		'payout' => 'required',
		'dolar_value' => 'required',
		'moneda_id' => 'required',
		'paystudio_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Invoicepaystudio::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'date' => $this-> date,
			'payout' => $this-> payout,
			'dolar_value' => $this-> dolar_value,
			'dolar_oficial' => $this-> dolar_oficial,
			'dolar_pagado' => $this-> dolar_pagado,
			'iva' => $this-> iva,
			'status' => $this-> status,
			'img_studio' => $this-> img_studio,
			'img_payment' => $this-> img_payment,
			'datax' => $this-> datax,
			'studio_id' => $this-> studio_id,
			'contable_id' => $this-> contable_id,
			'moneda_id' => $this-> moneda_id,
			'monetizador_id' => $this-> monetizador_id,
			'paystudio_id' => $this-> paystudio_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Invoicepaystudio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Invoicepaystudio::where('id', $id);
            $record->delete();
        }
    }
}
