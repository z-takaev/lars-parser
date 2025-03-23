<?php

namespace App\Livewire;

use App\Models\Car;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Queue extends Component
{
    public array $cars = [];

    public function mount(): void
    {
        $this->refreshCars();
    }

    public function render(): View
    {
        return view('livewire.queue');
    }

    public function refreshCars(): void
    {
        $this->cars = Car::query()
            ->select(['position', 'lang', 'number', 'model', 'registered_at'])
            ->get()
            ->toArray();
    }
}
