<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Estudio;

class Estudios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $ciudad, $dir, $empresa_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.estudios.view', [
            'estudios' => Estudio::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('ciudad', 'LIKE', $keyWord)
						->orWhere('dir', 'LIKE', $keyWord)
						->orWhere('empresa_id', 'LIKE', $keyWord)
						->paginate(50),
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
		$this->ciudad = null;
		$this->dir = null;
		$this->empresa_id = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
        ]);

        Estudio::create([ 
			'name' => $this-> name,
			'ciudad' => $this-> ciudad,
			'dir' => $this-> dir,
			'empresa_id' => $this-> empresa_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Estudio Successfully created.');
    }

    public function edit($id)
    {
        $record = Estudio::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->ciudad = $record-> ciudad;
		$this->dir = $record-> dir;
		$this->empresa_id = $record-> empresa_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Estudio::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'ciudad' => $this-> ciudad,
			'dir' => $this-> dir,
			'empresa_id' => $this-> empresa_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Estudio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        session()->flash('message', 'Estudio Destyu');
    
        if ($id) {
            $record = Estudio::where('id', $id);
            $record->delete();
        }
    }
}
