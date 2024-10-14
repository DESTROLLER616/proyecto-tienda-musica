<?php

namespace App\Livewire\Label;

use App\Models\Label;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateButton extends Component
{
    use WithFileUploads;

    public $isOpen = false;

    protected $listeners = ['openModal', 'closeModal'];

    public $avatar;
    public $name;
    public $description;

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function create() {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'avatar' => 'required|image|max:1024',
        ]);

        $avatar = $this->avatar->store('avatars', 'public');

        Label::create([
            'name' => $this->name,
            'description' => $this->description,
            'avatar' => $avatar,
        ]);

        $this->reset();
        $this->closeModal();
        // $this->emit('labelCreated');

        session()->flash('success', 'Label created successfully.');
    }

    public function render()
    {
        return view('livewire.label.create-button');
    }
}
