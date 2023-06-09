<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechonologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['Html', 'Css', 'Js', 'Vite', 'Php', 'Laravel'];
        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->title = $technology;
            $new_technology->slug = Str::slug($technology);
            $new_technology->save();
        }
    }
}