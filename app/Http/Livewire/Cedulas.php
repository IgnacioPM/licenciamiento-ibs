<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cedula;

class Cedulas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo_cliente;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.cedulas.view', [
            'cedulas' => Cedula::latest()
						->orWhere('tipo_cliente', 'LIKE', $keyWord)
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
		$this->tipo_cliente = null;
    }

    public function store()
    {
        $this->validate([
		'tipo_cliente' => 'required',
        ]);

        Cedula::create([ 
			'tipo_cliente' => $this-> tipo_cliente
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Cedula Successfully created.');
    }

    public function edit($id)
    {
        $record = Cedula::findOrFail($id);

        $this->selected_id = $id; 
		$this->tipo_cliente = $record-> tipo_cliente;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo_cliente' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Cedula::find($this->selected_id);
            $record->update([ 
			'tipo_cliente' => $this-> tipo_cliente
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
