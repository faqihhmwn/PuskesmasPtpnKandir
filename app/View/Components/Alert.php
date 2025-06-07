<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $type;  // deklarasi variabel yang akan dipakai di view

    // menerima parameter $type dari tag blade <x-alert type="success">
    public function __construct($type = 'info')
    {
        $this->type = $type;
    }

    public function render()
    {
        return view('components.alert');
    }
}
