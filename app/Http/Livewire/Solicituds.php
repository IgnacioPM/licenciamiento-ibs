<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Solicitud;

class Solicituds extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipo_solicitud;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.solicituds.view', [
            'solicituds' => Solicitud::latest()
						->orWhere('tipo_solicitud', 'LIKE', $keyWord)
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
		$this->tipo_solicitud = null;
    }

    public function store()
    {
        $this->validate([
		'tipo_solicitud' => 'required',
        ]);

        Solicitud::create([ 
			'tipo_solicitud' => $this-> tipo_solicitud
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Solicitud Successfully created.');
    }

    public function edit($id)
    {
        $record = Solicitud::findOrFail($id);

        $this->selected_id = $id; 
		$this->tipo_solicitud = $record-> tipo_solicitud;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipo_solicitud' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Solicitud::find($this->selected_id);
            $record->update([ 
			'tipo_solicitud' => $this-> tipo_solicitud
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Solicitud Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Solicitud::where('id', $id);
            $record->delete();
        }
    }
}
