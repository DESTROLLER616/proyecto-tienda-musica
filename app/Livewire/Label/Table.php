<?php

namespace App\Livewire\Label;

use App\Models\Label;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public $deleteId;
    public $deleteName;

    protected $listeners = ['closeModal'];

    public function reloadLabels()
    {
        // No es necesario hacer nada aquí, Livewire se encargará de recargar la vista
    }

    public function openDeleteModal($id, $name)
    {
        $this->deleteId = $id;
        $this->deleteName = $name;
    }

    public function delete()
    {
        Label::destroy($this->deleteId);
        $this->reset('deleteId', 'deleteName');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.label.table', [
            'labels' => Label::paginate(10),
        ]);
    }
}
