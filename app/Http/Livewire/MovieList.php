<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Movie;

class MovieList extends Component
{
    public function render()
    {
        $movies = Movie::all();
        return view('livewire.components.MovieList', compact('movies'))->layout('layouts.app');
    }
}