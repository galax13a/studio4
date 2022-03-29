<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Botroom;

class Botrooms extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $url, $datax, $status, $page_id, $tiposala;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.botrooms.view', [
            'botrooms' => Botroom::latest()
						->orWhere('url', 'LIKE', $keyWord)
						->orWhere('datax', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('page_id', 'LIKE', $keyWord)
						->orWhere('tiposala', 'LIKE', $keyWord)
						->paginate(100),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->url = null;
		$this->datax = null;
		$this->status = null;
		$this->page_id = null;
		$this->tiposala = null;
    }

    public function store()
    {
        $this->validate([
		'url' => 'required',
        ]);

        Botroom::create([ 
			'url' => $this-> url,
			'datax' => $this-> datax,
			'status' => $this-> status,
			'page_id' => $this-> page_id,
			'tiposala' => $this-> tiposala
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Botroom Successfully created.');
    }

    public function edit($id)
    {
        $record = Botroom::findOrFail($id);

        $this->selected_id = $id; 
		$this->url = $record-> url;
		$this->datax = $record-> datax;
		$this->status = $record-> status;
		$this->page_id = $record-> page_id;
		$this->tiposala = $record-> tiposala;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'url' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Botroom::find($this->selected_id);
            $record->update([ 
			'url' => $this-> url,
			'datax' => $this-> datax,
			'status' => $this-> status,
			'page_id' => $this-> page_id,
			'tiposala' => $this-> tiposala
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Botroom Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Botroom::where('id', $id);
            $record->delete();
        }
    }
}
