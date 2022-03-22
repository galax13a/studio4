<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Empresa;

class Empresas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $nit, $dir, $tel, $logo, $email, $wsp1, $pagina, $status, $users_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.empresas.view', [
            'empresas' => Empresa::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('nit', 'LIKE', $keyWord)
						->orWhere('dir', 'LIKE', $keyWord)
						->orWhere('tel', 'LIKE', $keyWord)
						->orWhere('logo', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('wsp1', 'LIKE', $keyWord)
						->orWhere('pagina', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('users_id', 'LIKE', $keyWord)
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
		$this->nit = null;
		$this->dir = null;
		$this->tel = null;
		$this->logo = null;
		$this->email = null;
		$this->wsp1 = null;
		$this->pagina = null;
		$this->status = null;
		$this->users_id = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'status' => 'required',
        ]);

        Empresa::create([ 
			'name' => $this-> name,
			'nit' => $this-> nit,
			'dir' => $this-> dir,
			'tel' => $this-> tel,
			'logo' => $this-> logo,
			'email' => $this-> email,
			'wsp1' => $this-> wsp1,
			'pagina' => $this-> pagina,
			'status' => $this-> status,
			'users_id' => $this-> users_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Empresa Successfully created.');
    }

    public function edit($id)
    {
        $record = Empresa::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->nit = $record-> nit;
		$this->dir = $record-> dir;
		$this->tel = $record-> tel;
		$this->logo = $record-> logo;
		$this->email = $record-> email;
		$this->wsp1 = $record-> wsp1;
		$this->pagina = $record-> pagina;
		$this->status = $record-> status;
		$this->users_id = $record-> users_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Empresa::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'nit' => $this-> nit,
			'dir' => $this-> dir,
			'tel' => $this-> tel,
			'logo' => $this-> logo,
			'email' => $this-> email,
			'wsp1' => $this-> wsp1,
			'pagina' => $this-> pagina,
			'status' => $this-> status,
			'users_id' => $this-> users_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Empresa Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Empresa::where('id', $id);
            $record->delete();
        }
    }
}
