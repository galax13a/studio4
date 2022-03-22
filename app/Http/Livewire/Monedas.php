<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Moneda;

class Monedas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $status;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.monedas.view', [
            'monedas' => Moneda::latest()
						->orWhere('name', 'LIKE', $keyWord)
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
		$this->status = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'status' => 'required',
        ]);

        Moneda::create([ 
			'name' => $this-> name,
			'status' => $this-> status
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Moneda Successfully created.');
    }

    public function edit($id)
    {
        $record = Moneda::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->status = $record-> status;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Moneda::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'status' => $this-> status
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Moneda Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Moneda::where('id', $id);
            $record->delete();
        }
    }
}
