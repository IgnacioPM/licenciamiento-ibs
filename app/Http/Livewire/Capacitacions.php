<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Capacitacion;

class Capacitacions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo_capacitacion;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.capacitacions.view', [
            'capacitacions' => Capacitacion::latest()
						->orWhere('tipo_capacitacion', 'LIKE', $keyWord)
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
		$this->tipo_capacitacion = null;
    }

    public function store()
    {
        $this->validate([
		'tipo_capacitacion' => 'required',
        ]);

        Capacitacion::create([ 
			'tipo_capacitacion' => $this-> tipo_capacitacion
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Capacitacion Successfully created.');
    }

    public function edit($id)
    {
        $record = Capacitacion::findOrFail($id);

        $this->selected_id = $id; 
		$this->tipo_capacitacion = $record-> tipo_capacitacion;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo_capacitacion' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Capacitacion::find($this->selected_id);
            $record->update([ 
			'tipo_capacitacion' => $this-> tipo_capacitacion
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Capacitacion Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Capacitacion::where('id', $id);
            $record->delete();
        }
    }
}
