<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Statstudio;

class Statstudios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $date, $date_ini, $date_finish, $payout, $status, $program, $studio_id, $page_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.statstudios.view', [
            'statstudios' => Statstudio::latest()
						->orWhere('date', 'LIKE', $keyWord)
						->orWhere('date_ini', 'LIKE', $keyWord)
						->orWhere('date_finish', 'LIKE', $keyWord)
						->orWhere('payout', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('program', 'LIKE', $keyWord)
						->orWhere('studio_id', 'LIKE', $keyWord)
						->orWhere('page_id', 'LIKE', $keyWord)
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
		$this->date_ini = null;
		$this->date_finish = null;
		$this->payout = null;
		$this->status = null;
		$this->program = null;
		$this->studio_id = null;
		$this->page_id = null;
    }

    public function store()
    {
        $this->validate([
		'payout' => 'required',
		'status' => 'required',
        ]);

        Statstudio::create([ 
			'date' => $this-> date,
			'date_ini' => $this-> date_ini,
			'date_finish' => $this-> date_finish,
			'payout' => $this-> payout,
			'status' => $this-> status,
			'program' => $this-> program,
			'studio_id' => $this-> studio_id,
			'page_id' => $this-> page_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Statstudio Successfully created.');
    }

    public function edit($id)
    {
        $record = Statstudio::findOrFail($id);

        $this->selected_id = $id; 
		$this->date = $record-> date;
		$this->date_ini = $record-> date_ini;
		$this->date_finish = $record-> date_finish;
		$this->payout = $record-> payout;
		$this->status = $record-> status;
		$this->program = $record-> program;
		$this->studio_id = $record-> studio_id;
		$this->page_id = $record-> page_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'payout' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Statstudio::find($this->selected_id);
            $record->update([ 
			'date' => $this-> date,
			'date_ini' => $this-> date_ini,
			'date_finish' => $this-> date_finish,
			'payout' => $this-> payout,
			'status' => $this-> status,
			'program' => $this-> program,
			'studio_id' => $this-> studio_id,
			'page_id' => $this-> page_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Statstudio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Statstudio::where('id', $id);
            $record->delete();
        }
    }
}
