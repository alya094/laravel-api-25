<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [ 
            ['name' => 'Andrea Hirata', 'birthdate' => '1967-10-24'],
            ['name' => 'Tere Liye', 'birthdate' => '1979-05-21'],
            ['name' => 'Dee Lestari', 'birthdate' => '1976-01-20'],
            ['name' => 'Pidi Baiq', 'birthdate' => '1972-08-08'],
            ['name' => 'Raditya Dika', 'birthdate' => '1984-12-28'],
           
        ];
        foreach ($authors as $author) {
            Author::create($author);
        }


        //
    }
}