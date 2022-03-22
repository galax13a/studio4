<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pagemodel;

class Pagemodels extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nick, $pass, $status, $galery, $studio_id, $model_id, $moneda_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.pagemodels.view', [
            'pagemodels' => Pagemodel::latest()
						->orWhere('nick', 'LIKE', $keyWord)
						->orWhere('pass', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('galery', 'LIKE', $keyWord)
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
		$this->nick = null;
		$this->pass = null;
		$this->status = null;
		$this->galery = null;
		$this->studio_id = null;
		$this->model_id = null;
		$this->moneda_id = null;
    }

    public function store()
    {
        $this->validate([
		'nick' => 'required',
		'status' => 'required',
		'model_id' => 'required',
		'moneda_id' => 'required',
        ]);

        Pagemodel::create([ 
			'nick' => $this-> nick,
			'pass' => $this-> pass,
			'status' => $this-> status,
			'galery' => $this-> galery,
			'studio_id' => $this-> studio_id,
			'model_id' => $this-> model_id,
			'moneda_id' => $this-> moneda_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Pagemodel Successfully created.');
    }

    public function edit($id)
    {
        $record = Pagemodel::findOrFail($id);

        $this->selected_id = $id; 
		$this->nick = $record-> nick;
		$this->pass = $record-> pass;
		$this->status = $record-> status;
		$this->galery = $record-> galery;
		$this->studio_id = $record-> studio_id;
		$this->model_id = $record-> model_id;
		$this->moneda_id = $record-> moneda_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'nick' => 'required',
		'status' => 'required',
		'model_id' => 'required',
		'moneda_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Pagemodel::find($this->selected_id);
            $record->update([ 
			'nick' => $this-> nick,
			'pass' => $this-> pass,
			'status' => $this-> status,
			'galery' => $this-> galery,
			'studio_id' => $this-> studio_id,
			'model_id' => $this-> model_id,
			'moneda_id' => $this-> moneda_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Pagemodel Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Pagemodel::where('id', $id);
            $record->delete();
        }
    }
}
