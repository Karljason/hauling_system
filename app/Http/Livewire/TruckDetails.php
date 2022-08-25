<?php

namespace App\Http\Livewire;

use App\Models\TruckType;
use Livewire\Component;

class TruckDetails extends Component
{
    public $cbotruckDetails = [];
    public $txtPlateNo = [];
    public $allTruckDetails = [];
    public $allTruckTypes = [];
    
    public function render()
    {
        $objTruckType = $this->allTruckTypes = TruckType::all();
        // dd($objTruckType);
        return view('livewire.truck-details', compact('objTruckType'));
    }
}
