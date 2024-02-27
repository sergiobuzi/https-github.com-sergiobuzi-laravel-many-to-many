<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Technology;

use App\Models\project;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Technology :: factory() 
        -> count(10) 
        -> create()
         //la each ci prende un elemento random di technology e lo associa 
        -> each(function($technology){

            $projects = Project :: inRandomOrder() -> limit(3) -> get();
            $technology -> projects() -> attach($projects);
            $technology -> save();
       });
    }
}
