<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Chaturstatstudio;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class Chaturstatstudios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $date, $date_ini, $date_finish, $payout, $status, $program, $studio_id;
    public $updateMode = false;
    public $apichatur_range, $apichatur_payout,$apichatur_tks, $apichatur_day;

    public function  mount(){

       // $this->apichatur = [];
    }

    public function render()
    {

		$keyWord = '%'.$this->keyWord .'%';

       $responde =  Http::get('https://chaturbate.com/affiliates/apistats/?username=studiocallss&token=VeGeK5kJiuUnbjeBvHHs8Lnt');
       $jsonData = $responde->json();
     
        $this->apichatur_range = $jsonData["range"];
        $this->apichatur_day = $jsonData["stats"][0]["rows"][0][0];
        $this->apichatur_tks = $jsonData["stats"][0]["rows"][0][1];
        $this->apichatur_payout = $jsonData["stats"][0]["rows"][0][2];

       //  dd($jsonData);
      //dd($jsonData["stats"][0]["totals"], $jsonData["range"],$jsonData["stats"][0]["program"],$jsonData["stats"][0]["rows"][0]);
       
          /* dd($jsonData["range"]);
            "start_date" => "2022-03-16"
            "end_date" => "2022-03-31"
          */

         /*  dd($jsonData["stats"][0]["program"]); */
         /*   dd($jsonData["stats"][0]["rows"]); 
            0 => "2022-03-16"
            1 => 1887
            2 => 94.35
         */
       
         /* dd($jsonData["stats"][0]["columns"]); 
            0 => "Date"
            1 => "Tokens"
            2 => "Payout"
         */
       
        /*   dd($jsonData["stats"][0]["totals"]); 
                ^ array:2 [▼
            "Tokens" => 1887
            "Payout" => 94.35
        */


        return view('livewire.chaturstatstudios.view', [
            'chaturstatstudios' => Chaturstatstudio::latest()
						->orWhere('date', 'LIKE', $keyWord)
						->paginate(30),
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
    }

    public function store()
    {
        $this->validate([
		'payout' => 'required',
		'status' => 'required',
        ]);

        Chaturstatstudio::create([ 
			'date' => $this-> date,
			'date_ini' => $this-> date_ini,
			'date_finish' => $this-> date_finish,
			'payout' => $this-> payout,
			'status' => $this-> status,
			'program' => $this-> program,
			'studio_id' => $this-> studio_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Chaturstatstudio Successfully created.');
    }

    public function edit($id)
    {
        $record = Chaturstatstudio::findOrFail($id);

        $this->selected_id = $id; 
		$this->date = $record-> date;
		$this->date_ini = $record-> date_ini;
		$this->date_finish = $record-> date_finish;
		$this->payout = $record-> payout;
		$this->status = $record-> status;
		$this->program = $record-> program;
		$this->studio_id = $record-> studio_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'payout' => 'required',
		'status' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Chaturstatstudio::find($this->selected_id);
            $record->update([ 
			'date' => $this-> date,
			'date_ini' => $this-> date_ini,
			'date_finish' => $this-> date_finish,
			'payout' => $this-> payout,
			'status' => $this-> status,
			'program' => $this-> program,
			'studio_id' => $this-> studio_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Chaturstatstudio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Chaturstatstudio::where('id', $id);
            $record->delete();
        }
    }
}
