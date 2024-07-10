<?php

namespace App\Livewire;

use Livewire\Component;

class ProviderWidget extends Component
{
    public $title;
    public $rating;
    public $note;
    public $seniority;

    public function mount($title, $rating, $note,$seniority)
    {
        $this->title = $title;
        $this->rating = $rating;
        $this->note = $note; 

        $this->seniority = $seniority;

    }
    
    public function render()
    {
        return view('livewire.provider-widget');
    }
}
