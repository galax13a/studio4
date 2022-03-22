<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Page;

class Pages extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $moneda, $value, $link, $status, $studio_id, $pagemaster_id;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.pages.view', [
            'pages' => Page::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('monedax', 'LIKE', $keyWord)
						->orWhere('value', 'LIKE', $keyWord)
						->orWhere('link', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->orWhere('studio_id', 'LIKE', $keyWord)
						->orWhere('pagemaster_id', 'LIKE', $keyWord)
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
		$this->moneda = null;
		$this->value = null;
		$this->link = null;
		$this->status = null;
		$this->studio_id = null;
		$this->pagemaster_id = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'value' => 'required',
		'status' => 'required',
        ]);

        Page::create([ 
			'name' => $this-> name,
			'monedax' => $this-> moneda,
			'value' => $this-> value,
			'link' => $this-> link,
			'status' => $this-> status,
			'studio_id' => $this-> studio_id,
			'pagemaster_id' => $this-> pagemaster_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Page Successfully created.');
    }

    public function edit($id)
    {
        $record = Page::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->moneda = $record-> moneda;
		$this->value = $record-> value;
		$this->link = $record-> link;
		$this->status = $record-> status;
		$this->studio_id = $record-> studio_id;
		$this->pagemaster_id = $record-> pagemaster_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'value' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Page::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'monedax' => $this-> moneda,
			'value' => $this-> value,
			'link' => $this-> link,
			'status' => $this-> status,
			'studio_id' => $this-> studio_id,
			'pagemaster_id' => $this-> pagemaster_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Page Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Page::where('id', $id);
            $record->delete();
        }
    }
}
