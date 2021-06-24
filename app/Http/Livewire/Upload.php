<?php

namespace App\Http\Livewire\Layouts;

use Livewire\Component;
use Livewire\WithFileUploads;

class Upload extends Component
{
    use WithFileUploads;

    public $photo;

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }

    public function render()
    {
        return view('livewire.upload');
    }
}
