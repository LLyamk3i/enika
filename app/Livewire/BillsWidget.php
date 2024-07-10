<?php

namespace App\Livewire;

use Livewire\Component;

class BillsWidget extends Component
{

    public $readyToAssign;
    public $assigned;
    public $totalBills;
    public $progressPercentage;

    public function mount($readyToAssign, $assigned, $totalBills, $progressPercentage)
    {
        $this->readyToAssign = $readyToAssign;
        $this->assigned = $assigned;
        $this->totalBills = $totalBills;
        $this->progressPercentage = $progressPercentage;
    }
    public function render()
    {
        return view('livewire.bills-widget');
    }
}
