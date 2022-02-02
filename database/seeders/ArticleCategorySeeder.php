<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_categories')->insert([
            'title' => 'News',
            'description' => 'Recent, but not necessarily unexpected, intelligence of something that has lately taken place, or of something before unknown or imperfectly known; tidings.'
        ]);

        DB::table('article_categories')->insert([
            'title' => 'Crime',
            'description' => 'An act committed in violation of law where the consequence of conviction by a court is punishment, especially where the punishment is a serious one such as imprisonment.'
        ]);

        DB::table('article_categories')->insert([
            'title' => 'Business',
            'description' => 'The activity of buying and selling commodities, products, or services.'
        ]);

        DB::table('article_categories')->insert([
            'title' => 'Sport',
            'description' => 'Sport pertains to any form of competitive physical activity or game that aims to use, maintain or improve physical ability and skills while providing enjoyment to participants and, in some cases, entertainment to spectators. Sports can, through casual or organized participation, improve ones physical health.'
        ]);

        DB::table('article_categories')->insert([
            'title' => 'Lifestyle',
            'description' => 'A style of living that reflects the attitudes and values of a person or group.'
        ]);

        DB::table('article_categories')->insert([
            'title' => 'Culture',
            'description' => 'The arts, beliefs, customs, institutions, and other products of human work and thought considered as a unit, especially with regard to a particular time or social group.'
        ]);
    }
}
