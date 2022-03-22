<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Chaturdata;
use Illuminate\Support\Facades\Http;


class Chaturdatas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $link, $type, $status, $studio_id, $pagemaster_id;
    public $updateMode = false;
    public $apichatur_range, $apichatur_payout,$apichatur_tks, $apichatur_day;

    public $api_username, $api_time_online, $api_tips_in_last_hour,$num_followers;
    public $api_token_balance,$api_satisfaction_score, $api_num_tokened_viewers,$api_votes_down,$api_votes_up;
    public $api_last_broadcast,$api_num_registered_viewers,$api_num_viewers;
    public $data_model,$api_programa;

    public function  mount(){

        // $this->apichatur = [];
     }


    public function render()
    {
    
		$keyWord = '%'.$this->keyWord .'%';

        $this->data_model = Chaturdata::where('type', 0)->get();  // nos traemos modelos



        return view('livewire.chaturdatas.view', [
            'chaturdatas' => Chaturdata::latest()
                        ->where('type',1)
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
		$this->link = null;
		$this->type = null;
		$this->status = null;
		$this->studio_id = null;
		$this->pagemaster_id = null;
    }

    public function store()
    {
        $this->validate([
		'link' => 'required',
		'type' => 'required',
        ]);

        Chaturdata::create([ 
			'name' => $this-> name,
			'link' => $this-> link,
			'type' => $this-> type,
			'status' => $this-> status,
			'studio_id' => $this-> studio_id,
			'pagemaster_id' => $this-> pagemaster_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Chaturdata Successfully created.');
    }

    public function edit($id)
    {
        $record = Chaturdata::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->link = $record-> link;
		$this->type = $record-> type;
		$this->status = $record-> status;
		$this->studio_id = $record-> studio_id;
		$this->pagemaster_id = $record-> pagemaster_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'link' => 'required',
		'type' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Chaturdata::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'link' => $this-> link,
			'type' => $this-> type,
			'status' => $this-> status,
			'studio_id' => $this-> studio_id,
			'pagemaster_id' => $this-> pagemaster_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Chaturdata Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Chaturdata::where('id', $id);
            $record->delete();
        }
    }
}
