<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pagemaster;

class Pagemasters extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $link, $logo, $status;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.pagemasters.view', [
            'pagemasters' => Pagemaster::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('link', 'LIKE', $keyWord)
						->orWhere('logo', 'LIKE', $keyWord)
						->orWhere('status', 'LIKE', $keyWord)
						->paginate(50),
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
		$this->link = null;
		$this->logo = null;
		$this->status = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
        ]);

        Pagemaster::create([ 
			'name' => $this-> name,
			'link' => $this-> link,
			'logo' => $this-> logo,
			'status' => $this-> status
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Pagemaster Successfully created.');
    }

    public function edit($id)
    {
        $record = Pagemaster::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->link = $record-> link;
		$this->logo = $record-> logo;
		$this->status = $record-> status;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Pagemaster::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'link' => $this-> link,
			'logo' => $this-> logo,
			'status' => $this-> status
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Pagemaster Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Pagemaster::where('id', $id);
            $record->delete();
        }
    }
}
