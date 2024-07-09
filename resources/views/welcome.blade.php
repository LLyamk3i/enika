@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="flex justify-between">
    <div>
        @livewire('bills-widget', [
        'readyToAssign' => '200',
        'assigned' => '42',
        'totalBills' => '221',
        'progressPercentage' => '42'
        ])

        @for ($i = 0; $i <= 12; $i++) <div class="shadow-md w-72 flex items-center p-3 my-2 border rounded-lg">
            <span class="relative flex h-3 w-3 mr-3">
                <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-gray-600 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-gray-900"></span>
            </span>
            <div>
                <div class="text-base">Operation effectué avec succès</div>
            </div>
    </div>
    @endfor


</div>
<div>

    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-4 m-4">
        @livewire('InvestWidget', [
        'title' => 'Total  d\'alertes',
        'amount' => '690.08',
        'percentageChange' => '-6.98',
        'volume' => '989,98.09',
        'progressImageUrl' => 'images/progress2.jpg'
        ])
        @livewire('InvestWidget', [
        'title' => 'Alertes en attentes',
        'amount' => '690.08',
        'percentageChange' => '-6.98',
        'volume' => '989,98.09',
        'progressImageUrl' => 'images/progress2.jpg'
        ])
        @livewire('InvestWidget', [
        'title' => 'Alertes en cours',
        'amount' => '690.08',
        'percentageChange' => '-6.98',
        'volume' => '989,98.09',
        'progressImageUrl' => 'images/progress2.jpg'
        ])
      
    </div>
    {{-- <div class="w-80">
        <livewire:PercentageWidgetComponent amount="892.98" percentage="22%" svgPath="images/progress.jpg" />
        <br>

    </div> --}}
    <br>
    @include('partials.cards.card')


</div>
@include('partials.sidebar')
</div>




@endsection