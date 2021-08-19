<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contrato;

class Contratos extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo_contrato;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.contratos.view', [
            'contratos' => Contrato::latest()
						->orWhere('tipo_contrato', 'LIKE', $keyWord)
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
		$this->tipo_contrato = null;
    }

    public function store()
    {
        $this->validate([
		'tipo_contrato' => 'required',
        ]);

        Contrato::create([ 
			'tipo_contrato' => $this-> tipo_contrato
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Contrato Successfully created.');
    }

    public function edit($id)
    {
        $record = Contrato::findOrFail($id);

        $this->selected_id = $id; 
		$this->tipo_contrato = $record-> tipo_contrato;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo_contrato' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Contrato::find($this->selected_id);
            $record->update([ 
			'tipo_contrato' => $this-> tipo_contrato
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Contrato Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Contrato::where('id', $id);
            $record->delete();
        }
    }
}
