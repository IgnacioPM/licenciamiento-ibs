<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cedula;

class Cedulas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo_cedula, $num_cedula;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.cedulas.view', [
            'cedulas' => Cedula::latest()
						->orWhere('tipo_cedula', 'LIKE', $keyWord)
						->orWhere('num_cedula', 'LIKE', $keyWord)
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
		$this->tipo_cedula = null;
		$this->num_cedula = null;
    }

    public function store()
    {
        $this->validate([
        ]);

        Cedula::create([ 
			'tipo_cedula' => $this-> tipo_cedula,
			'num_cedula' => $this-> num_cedula
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Cedula Successfully created.');
    }

    public function edit($id)
    {
        $record = Cedula::findOrFail($id);

        $this->selected_id = $id; 
		$this->tipo_cedula = $record-> tipo_cedula;
		$this->num_cedula = $record-> num_cedula;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
        ]);

        if ($this->selected_id) {
			$record = Cedula::find($this->selected_id);
            $record->update([ 
			'tipo_cedula' => $this-> tipo_cedula,
			'num_cedula' => $this-> num_cedula
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Cedula Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Cedula::where('id', $id);
            $record->delete();
        }
    }
}
