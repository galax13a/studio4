<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Prizesdetail;

class Prizesdetails extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $nota, $date, $studio_id, $model_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.prizesdetails.view', [
            'prizesdetails' => Prizesdetail::latest()
						->orWhere('nota', 'LIKE', $keyWord)
						->orWhere('date', 'LIKE', $keyWord)
						->orWhere('studio_id', 'LIKE', $keyWord)
						->orWhere('model_id', 'LIKE', $keyWord)
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
		$this->nota = null;
		$this->date = null;
		$this->studio_id = null;
		$this->model_id = null;
    }

    public function store()
    {
        $this->validate([
		'model_id' => 'required',
        ]);

        Prizesdetail::create([ 
			'nota' => $this-> nota,
			'date' => $this-> date,
			'studio_id' => $this-> studio_id,
			'model_id' => $this-> model_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Prizesdetail Successfully created.');
    }

    public function edit($id)
    {
        $record = Prizesdetail::findOrFail($id);

        $this->selected_id = $id; 
		$this->nota = $record-> nota;
		$this->date = $record-> date;
		$this->studio_id = $record-> studio_id;
		$this->model_id = $record-> model_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'model_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Prizesdetail::find($this->selected_id);
            $record->update([ 
			'nota' => $this-> nota,
			'date' => $this-> date,
			'studio_id' => $this-> studio_id,
			'model_id' => $this-> model_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Prizesdetail Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Prizesdetail::where('id', $id);
            $record->delete();
        }
    }
}
