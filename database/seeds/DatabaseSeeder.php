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
        // $this->call(UsersTableSeeder::class);
        $this->call(HeaderKeywordsTableSeeder::class);
        $this->call(HeaderInformationTableSeeder::class);
        $this->call(HeaderViewportTableSeeder::class);
        $this->call(PageStatusSeeder::class);
    }
}
