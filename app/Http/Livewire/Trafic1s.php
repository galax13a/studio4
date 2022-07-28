<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Trafic1;

class Trafic1s extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $url, $pagui, $datax, $status, $page_id, $tiposala;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.trafic1s.view', [
            'trafic1s' => Trafic1::orderBy('id', 'desc')
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
		$this->pagui = null;
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

        Trafic1::create([ 
			'url' => $this-> url,
			'pagui' => $this-> pagui,
			'datax' => $this-> datax,
			'status' => $this-> status,
			'page_id' => $this-> page_id,
			'tiposala' => $this-> tiposala
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Trafic1 Successfully created.');
    }

    public function edit($id)
    {
        $record = Trafic1::findOrFail($id);

        $this->selected_id = $id; 
		$this->url = $record-> url;
		$this->pagui = $record-> pagui;
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
			$record = Trafic1::find($this->selected_id);
            $record->update([ 
			'url' => $this-> url,
			'pagui' => $this-> pagui,
			'datax' => $this-> datax,
			'status' => $this-> status,
			'page_id' => $this-> page_id,
			'tiposala' => $this-> tiposala
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Trafic1 Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Trafic1::where('id', $id);
            $record->delete();
        }
    }
}
