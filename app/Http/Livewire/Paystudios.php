<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Paystudio;

class Paystudios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $date, $num, $data1, $data2, $date_ini, $date_finish, $payout, $status, $program, $studio_id, $page_id, $medio_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.paystudios.view', [
            'paystudios' => Paystudio::latest()
						->orWhere('date', 'LIKE', $keyWord)
						->orWhere('num', 'LIKE', $keyWord)
						->orWhere('data1', 'LIKE', $keyWord)
						->orWhere('data2', 'LIKE', $keyWord)
						->orWhere('date_ini', 'LIKE', $keyWord)
						->orWhere('date_finish', 'LIKE', $keyWord)
						->orWhere('payout', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('program', 'LIKE', $keyWord)
						->orWhere('studio_id', 'LIKE', $keyWord)
						->orWhere('page_id', 'LIKE', $keyWord)
						->orWhere('medio_id', 'LIKE', $keyWord)
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
		$this->num = null;
		$this->data1 = null;
		$this->data2 = null;
		$this->date_ini = null;
		$this->date_finish = null;
		$this->payout = null;
		$this->status = null;
		$this->program = null;
		$this->studio_id = null;
		$this->page_id = null;
		$this->medio_id = null;
    }

    public function store()
    {
        $this->validate([
		'payout' => 'required',
		'status' => 'required',
		'page_id' => 'required',
		'medio_id' => 'required',
        ]);

        Paystudio::create([ 
			'date' => $this-> date,
			'num' => $this-> num,
			'data1' => $this-> data1,
			'data2' => $this-> data2,
			'date_ini' => $this-> date_ini,
			'date_finish' => $this-> date_finish,
			'payout' => $this-> payout,
			'status' => $this-> status,
			'program' => $this-> program,
			'studio_id' => $this-> studio_id,
			'page_id' => $this-> page_id,
			'medio_id' => $this-> medio_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Paystudio Successfully created.');
    }

    public function edit($id)
    {
        $record = Paystudio::findOrFail($id);

        $this->selected_id = $id; 
		$this->date = $record-> date;
		$this->num = $record-> num;
		$this->data1 = $record-> data1;
		$this->data2 = $record-> data2;
		$this->date_ini = $record-> date_ini;
		$this->date_finish = $record-> date_finish;
		$this->payout = $record-> payout;
		$this->status = $record-> status;
		$this->program = $record-> program;
		$this->studio_id = $record-> studio_id;
		$this->page_id = $record-> page_id;
		$this->medio_id = $record-> medio_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'payout' => 'required',
		'status' => 'required',
		'page_id' => 'required',
		'medio_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Paystudio::find($this->selected_id);
            $record->update([ 
			'date' => $this-> date,
			'num' => $this-> num,
			'data1' => $this-> data1,
			'data2' => $this-> data2,
			'date_ini' => $this-> date_ini,
			'date_finish' => $this-> date_finish,
			'payout' => $this-> payout,
			'status' => $this-> status,
			'program' => $this-> program,
			'studio_id' => $this-> studio_id,
			'page_id' => $this-> page_id,
			'medio_id' => $this-> medio_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Paystudio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Paystudio::where('id', $id);
            $record->delete();
        }
    }
}
