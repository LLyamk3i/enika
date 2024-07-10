<?php

namespace App\Livewire;

use Livewire\Component;

class InvestWidget extends Component
{
    public $amount;
    public $title;
    public $percentageChange;
    public $volume;
    public $progressImageUrl;

    public function mount($amount, $percentageChange, $volume, $progressImageUrl,$title)
    {
        $this->amount = $amount;
        $this->percentageChange = $percentageChange;
        $this->volume = $volume;
        $this->title = $title;
        $this->progressImageUrl = $progressImageUrl;
    }
    public function render()
    {
        return view('livewire.invest-widget');
    }
}
