<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Todo;

class LivewireTodos extends Component
{

    public $search = '';

    public function render()
    {
        return view('livewire.livewire-todos', [
            // 'todos' => Todo::where('title', $this->search)->get()
            'todos' => Todo::where('title', 'LIKE', '%'.$this->search.'%')->get()
        ]);
    }
}
