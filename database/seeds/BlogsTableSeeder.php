<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'title' => 'Visit Nepal 2018',
                'summary' => 'heaven on earth',
                'details' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
             Animi aspernatur commodi dignissimos doloremque ducimus error eum eveniet 
             exercitationem fuga magnam nemo, nesciunt quidem quisquam, tempora ut, velit veritatis vero vitae!'
            ],
            [
                'title' => 'Nepal Politics Stability',
                'summary' => 'heaven on earth',
                'details' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.
             Animi aspernatur commodi dignissimos doloremque ducimus error eum eveniet 
             exercitationem fuga magnam nemo, nesciunt quidem quisquam, tempora ut, velit veritatis vero vitae!'
            ]
        ]);
    }
}
