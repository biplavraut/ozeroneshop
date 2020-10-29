<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Seo;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seo::create([
            'title' => 'a',
            'keyword' => 'a',
            'subject' => 'a',
            'topic'=> 'a',
            'summary' => 'a',
            'classification' => 'a',
            'category' => 'a',
            'excerpt' => 'a'
        ]);
    }
}
