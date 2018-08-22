<?php

use App\crud;
use Illuminate\Database\Seeder;

class CrudTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 50; $i++) {
            crud::create([
                'taskName' => $faker->sentence,
                'taskDescription' => $faker->paragraph,
                'dueDate' => $faker->date(),
            ]);
        }
    }
}
