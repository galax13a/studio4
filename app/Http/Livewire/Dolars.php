<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dolar;

class Dolars extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $trm, $trm2, $date;
    public $updateMode = false;
    public $fecha = null;
    public $dolar_fill = null;

    public function render()
    {
        date_default_timezone_set("America/Bogota");
		$keyWord = '%'.$this->keyWord .'%';
        $this->fecha = date('Y-m-d'); //strftime("Hoy es %A y son las %H:%M");

        $this->dolar_fill = Dolar::where('date',$this->fecha )->get();

        return view('livewire.dolars.view', [
            'dolars' => Dolar::latest()
						->orWhere('date', 'LIKE', $keyWord)
						->paginate(31),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->trm = null;
		$this->trm2 = null;
		$this->date = null;
    }

    public function store()
    {
        $this->validate([
            'trm' => "required",
            'date' => "required|unique:dolars,date"
        ]);

        date_default_timezone_set("America/Bogota");
        $this->fecha = date('Y-m-d'); //strftime("Hoy es %A y son las %H:%M");


        Dolar::create([ 
			'trm' => $this-> trm,
			'trm2' => $this-> trm2,
			'date' => $this-> date
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Dolar Successfully created.');
    }

    public function edit($id)
    {
       

        $record = Dolar::findOrFail($id);

        $this->selected_id = $id; 
		$this->trm = $record-> trm;
		$this->trm2 = $record-> trm2;
		$this->date = $record-> date;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'trm' => "required",
            'date' => "required|unique:dolars,date",
        ]);

        if ($this->selected_id) {
			$record = Dolar::find($this->selected_id);
            $record->update([ 
			'trm' => $this-> trm,
			'trm2' => $this-> trm2,
			'date' => $this-> date
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Dolar Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Dolar::where('id', $id);
            $record->delete();
        }
    }
}
