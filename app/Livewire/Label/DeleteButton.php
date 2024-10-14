<?php

namespace App\Livewire\Label;

use Livewire\Component;

class DeleteButton extends Component
{
    public $id;

    public function render()
    {
        return view('livewire.label.delete-button');
    }
}
