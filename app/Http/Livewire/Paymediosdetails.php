<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Paymediosdetail;

class Paymediosdetails extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $status, $model_id, $paymedio_id;
    public $updateMode = false, $account;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.paymediosdetails.view', [
            'paymediosdetails' => Paymediosdetail::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('studio_id', 'LIKE', $keyWord)
						->orWhere('model_id', 'LIKE', $keyWord)
						->orWhere('paymedio_id', 'LIKE', $keyWord)
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
		$this->status = null;
		$this->account = null;
		$this->model_id = null;
		$this->paymedio_id = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
        ]);

        Paymediosdetail::create([ 
			'name' => $this-> name,
			'status' => $this-> status,
			'model_id' => $this-> model_id,
            'account' =>$this->account,
			'paymedio_id' => $this-> paymedio_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Paymediosdetail Successfully created.');
    }

    public function edit($id)
    {
        $record = Paymediosdetail::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->status = $record-> status;
		$this->account = $record-> account;
		$this->model_id = $record-> model_id;
		$this->paymedio_id = $record-> paymedio_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Paymediosdetail::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'status' => $this-> status,
			'model_id' => $this-> model_id,
			'paymedio_id' => $this-> paymedio_id,
            'account' => $this-> account
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Paymediosdetail Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Paymediosdetail::where('id', $id);
            $record->delete();
        }
    }
}
