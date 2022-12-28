<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{   
    public $count=1;
public $umer=false;

    public function render()
    {
        return view('livewire.counter',['counter'=>$this->count]);
    }
    public function increment(){
        // dd('umer');
        $this->count++;
    }
    public function decrement(){
        // dd('umer');
        $this->count--;
    }
}
