<?php

namespace App\Livewire;

use Livewire\Component;

class Navigation extends Component
{
    public $nameSearch;
    public function render()
    {
        return view('livewire.navigation');
    }
    public function search(){
        $this->nameSearch;
    }
}
