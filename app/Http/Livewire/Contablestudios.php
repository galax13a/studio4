<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contablestudio;

class Contablestudios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $value, $status, $codesubmaster, $datax, $studio_id, $contable_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.contablestudios.view', [
            'contablestudios' => Contablestudio::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('value', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('codesubmaster', 'LIKE', $keyWord)
						->orWhere('datax', 'LIKE', $keyWord)
						->orWhere('studio_id', 'LIKE', $keyWord)
						->orWhere('contable_id', 'LIKE', $keyWord)
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
		$this->codesubmaster = null;
		$this->datax = null;
		$this->studio_id = null;
		$this->contable_id = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'value' => 'required',
		'codesubmaster' => 'required',
        ]);

        Contablestudio::create([ 
			'name' => $this-> name,
			'value' => $this-> value,
			'status' => $this-> status,
			'codesubmaster' => $this-> codesubmaster,
			'datax' => $this-> datax,
			'studio_id' => $this-> studio_id,
			'contable_id' => $this-> contable_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Contablestudio Successfully created.');
    }

    public function edit($id)
    {
        $record = Contablestudio::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->value = $record-> value;
		$this->status = $record-> status;
		$this->codesubmaster = $record-> codesubmaster;
		$this->datax = $record-> datax;
		$this->studio_id = $record-> studio_id;
		$this->contable_id = $record-> contable_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'value' => 'required',
		'codesubmaster' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Contablestudio::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'value' => $this-> value,
			'status' => $this-> status,
			'codesubmaster' => $this-> codesubmaster,
			'datax' => $this-> datax,
			'studio_id' => $this-> studio_id,
			'contable_id' => $this-> contable_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Contablestudio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Contablestudio::where('id', $id);
            $record->delete();
        }
    }
}
