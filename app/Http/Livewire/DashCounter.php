<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Canine;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class DashCounter extends Component
{

    public $users = 0;
    public $canines = 0;
    public $clients = 0;
    public $trainers = 0;

    public function render()
    {
        $this->users = User::count();
        $this->canines = Canine::count();
        $this->clients = User::whereHas('roles', function (Builder $query) {
            $query->where('role_id', 'like', '3');
        })->count();
        $this->trainers = User::whereHas('roles', function (Builder $query) {
            $query->where('role_id', 'like', '2');
        })->count();
        return view('livewire.dash-counter');
    }
}
