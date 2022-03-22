<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Paypage;

class Paypages extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $date, $value, $studio_id, $model_id, $moneda_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.paypages.view', [
            'paypages' => Paypage::latest()
						->orWhere('date', 'LIKE', $keyWord)
						->orWhere('value', 'LIKE', $keyWord)
						->orWhere('studio_id', 'LIKE', $keyWord)
						->orWhere('model_id', 'LIKE', $keyWord)
						->orWhere('moneda_id', 'LIKE', $keyWord)
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
		$this->date = null;
		$this->value = null;
		$this->studio_id = null;
		$this->model_id = null;
		$this->moneda_id = null;
    }

    public function store()
    {
        $this->validate([
		'value' => 'required',
		'model_id' => 'required',
		'moneda_id' => 'required',
        ]);

        Paypage::create([ 
			'date' => $this-> date,
			'value' => $this-> value,
			'studio_id' => $this-> studio_id,
			'model_id' => $this-> model_id,
			'moneda_id' => $this-> moneda_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Paypage Successfully created.');
    }

    public function edit($id)
    {
        $record = Paypage::findOrFail($id);

        $this->selected_id = $id; 
		$this->date = $record-> date;
		$this->value = $record-> value;
		$this->studio_id = $record-> studio_id;
		$this->model_id = $record-> model_id;
		$this->moneda_id = $record-> moneda_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'value' => 'required',
		'model_id' => 'required',
		'moneda_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Paypage::find($this->selected_id);
            $record->update([ 
			'date' => $this-> date,
			'value' => $this-> value,
			'studio_id' => $this-> studio_id,
			'model_id' => $this-> model_id,
			'moneda_id' => $this-> moneda_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Paypage Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Paypage::where('id', $id);
            $record->delete();
        }
    }
}
