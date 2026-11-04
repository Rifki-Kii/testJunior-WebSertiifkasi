<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Avatar: The Last Airbender',
                'poster' => 'img/avatar.jpg',
                'genre' => 'Animation, Comedy, Drama',
                'price' => 35000,
            ],
            [
                'title' => 'Star Wars',
                'poster' => 'img/starwars.jpg',
                'genre' => 'Action, Sci-Fi',
                'price' => 35000,
            ],
            [
                'title' => 'Cinderella',
                'poster' => 'img/cinderela.jpg',
                'genre' => 'Animation, Family',
                'price' => 35000,
            ],
            [
                'title' => 'Naruto - the last',
                'poster' => 'img/naruto.jpg',
                'genre' => 'Animation, Family, Comedy',
                'price' => 35000,
            ],
            [
                'title' => 'The Batman',
                'poster' => 'img/batman.jpg',
                'genre' => 'Action, Crime, Drama',
                'price' => 35000,
            ],
            [
                'title' => 'Dune: Part Two',
                'poster' => 'https://image.tmdb.org/t/p/w500/8b8R8l88Qje9dn9OE8PY05Nxl1X.jpg',
                'genre' => 'Action, Adventure, Sci-Fi',
                'price' => 35000,
            ],
        ];

        foreach ($movies as $movie) {
            Movie::updateOrCreate(
                ['title' => $movie['title']],
                $movie
            );
        }
    }
}