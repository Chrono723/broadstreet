<?php

use Illuminate\Database\Seeder;
use App\HeaderInformation;

class HeaderInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $information = new HeaderInformation();
        $information -> author = 'Creative-Onslaught';
        $information -> description ='Xware is a CMS development kit built on top of various frameworks for quick web application creation.';
        $information -> is_active = true;
        $information -> pages = 'all';
        $information -> save();
    }
}
