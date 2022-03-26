<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Modelo;

class Modelos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $nick, $email, $dni, $wsp, $porce, $typomodel, $img1, $img2, $img3, $status, $studio_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
		$this->emit('tablex');

        return view('livewire.modelos.view', [
            'modelos' => Modelo::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('nick', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('dni', 'LIKE', $keyWord)
						->orWhere('wsp', 'LIKE', $keyWord)
						->orWhere('porce', 'LIKE', $keyWord)
						->orWhere('typomodel', 'LIKE', $keyWord)
						->orWhere('img1', 'LIKE', $keyWord)
						->orWhere('img2', 'LIKE', $keyWord)
						->orWhere('img3', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('studio_id', 'LIKE', $keyWord)
						->paginate(5),
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
		$this->nick = null;
		$this->email = null;
		$this->dni = null;
		$this->wsp = null;
		$this->porce = null;
		$this->typomodel = null;
		$this->img1 = null;
		$this->img2 = null;
		$this->img3 = null;
		$this->status = null;
		$this->studio_id = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'porce' => 'required',
		'typomodel' => 'required',
		'status' => 'required',
        ]);

        Modelo::create([ 
			'name' => $this-> name,
			'nick' => $this-> nick,
			'email' => $this-> email,
			'dni' => $this-> dni,
			'wsp' => $this-> wsp,
			'porce' => $this-> porce,
			'typomodel' => $this-> typomodel,
			'img1' => $this-> img1,
			'img2' => $this-> img2,
			'img3' => $this-> img3,
			'status' => $this-> status,
			'studio_id' => $this-> studio_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Modelo Successfully created.');
    }

    public function edit($id)
    {
        $record = Modelo::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->nick = $record-> nick;
		$this->email = $record-> email;
		$this->dni = $record-> dni;
		$this->wsp = $record-> wsp;
		$this->porce = $record-> porce;
		$this->typomodel = $record-> typomodel;
		$this->img1 = $record-> img1;
		$this->img2 = $record-> img2;
		$this->img3 = $record-> img3;
		$this->status = $record-> status;
		$this->studio_id = $record-> studio_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'porce' => 'required',
		'typomodel' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Modelo::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'nick' => $this-> nick,
			'email' => $this-> email,
			'dni' => $this-> dni,
			'wsp' => $this-> wsp,
			'porce' => $this-> porce,
			'typomodel' => $this-> typomodel,
			'img1' => $this-> img1,
			'img2' => $this-> img2,
			'img3' => $this-> img3,
			'status' => $this-> status,
			'studio_id' => $this-> studio_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Modelo Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Modelo::where('id', $id);
            $record->delete();
        }
    }
}
