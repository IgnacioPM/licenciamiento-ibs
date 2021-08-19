<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Comercio;

class Comercios extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo_comercio;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.comercios.view', [
            'comercios' => Comercio::latest()
						->orWhere('tipo_comercio', 'LIKE', $keyWord)
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
		$this->tipo_comercio = null;
    }

    public function store()
    {
        $this->validate([
		'tipo_comercio' => 'required',
        ]);

        Comercio::create([ 
			'tipo_comercio' => $this-> tipo_comercio
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Comercio Successfully created.');
    }

    public function edit($id)
    {
        $record = Comercio::findOrFail($id);

        $this->selected_id = $id; 
		$this->tipo_comercio = $record-> tipo_comercio;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo_comercio' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Comercio::find($this->selected_id);
            $record->update([ 
			'tipo_comercio' => $this-> tipo_comercio
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Comercio Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Comercio::where('id', $id);
            $record->delete();
        }
    }
}
