<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Monetizadore;

class Monetizadores extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $pagina, $contact, $email, $porce, $status, $datax;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.monetizadores.view', [
            'monetizadores' => Monetizadore::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('pagina', 'LIKE', $keyWord)
						->orWhere('contact', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('porce', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('datax', 'LIKE', $keyWord)
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
		$this->pagina = null;
		$this->contact = null;
		$this->email = null;
		$this->porce = null;
		$this->status = null;
		$this->datax = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'porce' => 'required',
        ]);

        Monetizadore::create([ 
			'name' => $this-> name,
			'pagina' => $this-> pagina,
			'contact' => $this-> contact,
			'email' => $this-> email,
			'porce' => $this-> porce,
			'status' => $this-> status,
			'datax' => $this-> datax
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Monetizadore Successfully created.');
    }

    public function edit($id)
    {
        $record = Monetizadore::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->pagina = $record-> pagina;
		$this->contact = $record-> contact;
		$this->email = $record-> email;
		$this->porce = $record-> porce;
		$this->status = $record-> status;
		$this->datax = $record-> datax;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'porce' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Monetizadore::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'pagina' => $this-> pagina,
			'contact' => $this-> contact,
			'email' => $this-> email,
			'porce' => $this-> porce,
			'status' => $this-> status,
			'datax' => $this-> datax
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Monetizadore Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Monetizadore::where('id', $id);
            $record->delete();
        }
    }
}
