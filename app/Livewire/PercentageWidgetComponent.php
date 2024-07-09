<?php

namespace App\Livewire;

use Livewire\Component;

class PercentageWidgetComponent extends Component
{
    public $amount;
    public $percentage;
    public $svgPath;

    public function mount($amount, $percentage, $svgPath)
    {
        $this->amount = $amount;
        $this->percentage = $percentage;
        $this->svgPath = $svgPath;
    }

    public function render()
    {
        return view('livewire.percentage-widget-component');
    }
}
