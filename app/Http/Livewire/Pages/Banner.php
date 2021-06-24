<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Banner extends Component
{
    public function render()
    {
        return view('livewire.pages.banner')->layout('livewire.livewireapp');
    }
}
