@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="flex justify-between">
    <div>
        @for ($i = 0; $i <= 15; $i++)
        <div class="shadow-md w-72 flex items-center p-3 my-2 border rounded-lg">
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
        @include('partials.cards.card')
    </div>
    @include('partials.sidebar')
</div>




@endsection