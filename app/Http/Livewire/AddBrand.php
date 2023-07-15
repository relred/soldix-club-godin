<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;


class AddBrand extends Component
{
    use WithFileUploads;

    public $image;

    public function render()
    {
        return view('livewire.add-brand');
    }

    public function unset_all()
    {
        unset($this->image);
    }
}
