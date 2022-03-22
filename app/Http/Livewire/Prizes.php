<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Prize;

class Prizes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $description, $date, $date2, $value, $status, $img, $studio_id, $model_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.prizes.view', [
            'prizes' => Prize::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('description', 'LIKE', $keyWord)
						->orWhere('date', 'LIKE', $keyWord)
						->orWhere('date2', 'LIKE', $keyWord)
						->orWhere('value', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('img', 'LIKE', $keyWord)
						->orWhere('studio_id', 'LIKE', $keyWord)
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
		$this->description = null;
		$this->date = null;
		$this->date2 = null;
		$this->value = null;
		$this->status = null;
		$this->img = null;
		$this->studio_id = null;
		$this->model_id = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'value' => 'required',
		'status' => 'required',
		'model_id' => 'required',
        ]);

        Prize::create([ 
			'name' => $this-> name,
			'description' => $this-> description,
			'date' => $this-> date,
			'date2' => $this-> date2,
			'value' => $this-> value,
			'status' => $this-> status,
			'img' => $this-> img,
			'studio_id' => $this-> studio_id,
			'model_id' => $this-> model_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Prize Successfully created.');
    }

    public function edit($id)
    {
        $record = Prize::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->description = $record-> description;
		$this->date = $record-> date;
		$this->date2 = $record-> date2;
		$this->value = $record-> value;
		$this->status = $record-> status;
		$this->img = $record-> img;
		$this->studio_id = $record-> studio_id;
		$this->model_id = $record-> model_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'value' => 'required',
		'status' => 'required',
		'model_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Prize::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'description' => $this-> description,
			'date' => $this-> date,
			'date2' => $this-> date2,
			'value' => $this-> value,
			'status' => $this-> status,
			'img' => $this-> img,
			'studio_id' => $this-> studio_id,
			'model_id' => $this-> model_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Prize Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Prize::where('id', $id);
            $record->delete();
        }
    }
}
