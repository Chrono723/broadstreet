<?php

use Illuminate\Database\Seeder;
use App\HeaderKeywords;

class HeaderKeywordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keyword = new HeaderKeywords();
        $keyword -> name = 'xware';
        $keyword -> is_active = true;
        $keyword -> pages = 'all';
        $keyword -> save();

        $keyword = new HeaderKeywords();
        $keyword -> name = 'cms';
        $keyword -> is_active = true;
        $keyword -> pages = 'all';
        $keyword -> save();

        $keyword = new HeaderKeywords();
        $keyword -> name = 'content management system';
        $keyword -> is_active = true;
        $keyword -> pages = 'all';
        $keyword -> save();

        $keyword = new HeaderKeywords();
        $keyword -> name = 'website app manager';
        $keyword -> is_active = true;
        $keyword -> pages = 'all';
        $keyword -> save();

        $keyword = new HeaderKeywords();
        $keyword -> name = 'community website builder';
        $keyword -> is_active = true;
        $keyword -> pages = 'all';
        $keyword -> save();

        $keyword = new HeaderKeywords();
        $keyword -> name = 'professional website builder';
        $keyword -> is_active = true;
        $keyword -> pages = 'all';
        $keyword -> save();
    }
}
