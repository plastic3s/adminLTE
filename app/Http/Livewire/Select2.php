<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Select2 extends Component
{
    public $s2;
    public $selCity = '';
    public $cities = [
        'Rajkot',
        'Surat',
        'Baroda',
    ];

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        return view('select2.select2');
    }

}
