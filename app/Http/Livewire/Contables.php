<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contable;

class Contables extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $value, $status, $codemaster, $datax, $empresa_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.contables.view', [
            'contables' => Contable::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('value', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('codemaster', 'LIKE', $keyWord)
						->orWhere('datax', 'LIKE', $keyWord)
						->orWhere('empresa_id', 'LIKE', $keyWord)
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
		$this->value = null;
		$this->status = null;
		$this->codemaster = null;
		$this->datax = null;
		$this->empresa_id = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'value' => 'required',
		'codemaster' => 'required',
        ]);

        Contable::create([ 
			'name' => $this-> name,
			'value' => $this-> value,
			'status' => $this-> status,
			'codemaster' => $this-> codemaster,
			'datax' => $this-> datax,
			'empresa_id' => $this-> empresa_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Contable Successfully created.');
    }

    public function edit($id)
    {
        $record = Contable::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->value = $record-> value;
		$this->status = $record-> status;
		$this->codemaster = $record-> codemaster;
		$this->datax = $record-> datax;
		$this->empresa_id = $record-> empresa_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'value' => 'required',
		'codemaster' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Contable::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'value' => $this-> value,
			'status' => $this-> status,
			'codemaster' => $this-> codemaster,
			'datax' => $this-> datax,
			'empresa_id' => $this-> empresa_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Contable Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Contable::where('id', $id);
            $record->delete();
        }
    }
}
