<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Paymedio;

class Paymedios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $datax, $studio_id, $moneda_id, $status;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.paymedios.view', [
            'paymedios' => Paymedio::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('datax', 'LIKE', $keyWord)
						->orWhere('moneda_id', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
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
		$this->datax = null;
		$this->moneda_id = null;
		$this->status = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'moneda_id' => 'required',
        ]);

        Paymedio::create([ 
			'name' => $this-> name,
			'datax' => $this-> datax,
			'moneda_id' => $this-> moneda_id,
			'status' => $this-> status
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Paymedio Successfully created.');
    }

    public function edit($id)
    {
        $record = Paymedio::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->datax = $record-> datax;
		$this->moneda_id = $record-> moneda_id;
		$this->status = $record-> status;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'moneda_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Paymedio::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'datax' => $this-> datax,
			'moneda_id' => $this-> moneda_id,
			'status' => $this-> status
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Paymedio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Paymedio::where('id', $id);
            $record->delete();
        }
    }
}
