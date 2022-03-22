<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Conexion;

class Conexions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $date, $time_page, $time_real, $time_min, $timebrb, $studio_id, $model_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.conexions.view', [
            'conexions' => Conexion::latest()
						->orWhere('date', 'LIKE', $keyWord)
						->orWhere('time_page', 'LIKE', $keyWord)
						->orWhere('time_real', 'LIKE', $keyWord)
						->orWhere('time_min', 'LIKE', $keyWord)
						->orWhere('timebrb', 'LIKE', $keyWord)
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
		$this->date = null;
		$this->time_page = null;
		$this->time_real = null;
		$this->time_min = null;
		$this->timebrb = null;
		$this->studio_id = null;
		$this->model_id = null;
    }

    public function store()
    {
        $this->validate([
		'date' => 'required',
		'time_page' => 'required',
		'time_real' => 'required',
		'time_min' => 'required',
        ]);

        Conexion::create([ 
			'date' => $this-> date,
			'time_page' => $this-> time_page,
			'time_real' => $this-> time_real,
			'time_min' => $this-> time_min,
			'timebrb' => $this-> timebrb,
			'studio_id' => $this-> studio_id,
			'model_id' => $this-> model_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Conexion Successfully created.');
    }

    public function edit($id)
    {
        $record = Conexion::findOrFail($id);

        $this->selected_id = $id; 
		$this->date = $record-> date;
		$this->time_page = $record-> time_page;
		$this->time_real = $record-> time_real;
		$this->time_min = $record-> time_min;
		$this->timebrb = $record-> timebrb;
		$this->studio_id = $record-> studio_id;
		$this->model_id = $record-> model_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'date' => 'required',
		'time_page' => 'required',
		'time_real' => 'required',
		'time_min' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Conexion::find($this->selected_id);
            $record->update([ 
			'date' => $this-> date,
			'time_page' => $this-> time_page,
			'time_real' => $this-> time_real,
			'time_min' => $this-> time_min,
			'timebrb' => $this-> timebrb,
			'studio_id' => $this-> studio_id,
			'model_id' => $this-> model_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Conexion Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Conexion::where('id', $id);
            $record->delete();
        }
    }
}
