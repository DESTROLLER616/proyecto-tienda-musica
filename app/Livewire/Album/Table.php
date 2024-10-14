<?php

namespace App\Livewire\Album;

use App\Models\Album;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.album.table', [
            'albums' => Album::paginate(10),
        ]);
    }
}
