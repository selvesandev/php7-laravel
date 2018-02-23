<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(BlogsTableSeeder::class);

//        factory(\App\Models\Blog::class, 100)->create();
        factory(\App\Models\User::class, 20)->create();
    }

}
