<?php

namespace KraftHaus\WebClip\Seeders;

use Illuminate\Database\Seeder;
use KraftHaus\WebClip\Eloquent\Models\Website;

class WebsitesTableSeeder extends Seeder
{
    /**
     * Run the database seeder.
     *
     * @return void
     */
    public function run()
    {
        $website = Website::create([
            'name' => 'Test Website',
            'domain' => 'website-1.b4.dev',
            'css_rules' => '{"children":{".element_77e1782a-752a-4406-a7ed-005997602022":{"attributes":{"margin-top":"50px","margin-bottom":"50px"}}}}',
        ]);

        $website->activate();
    }
}
