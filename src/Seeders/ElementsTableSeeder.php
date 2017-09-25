<?php

namespace KraftHaus\WebClip\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use KraftHaus\WebClip\Eloquent\Models\Element;

class ElementsTableSeeder extends Seeder
{
    /**
     * Run the database seeder.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $root = Element::create([
            'website_id' => 1,
            'page_id' => 1,
            'element_type' => 'layout.section',
        ])->makeRoot();

        $row = Element::create([
            'website_id' => 1,
            'page_id' => 1,
            'element_type' => 'layout.row',
        ]);

        for ($i = 0; $i < 2; $i++) {
            $column = Element::create([
                'website_id' => 1,
                'page_id' => 1,
                'element_type' => 'layout.column',
            ]);

            $column->parent()->associate($row)->save();

            $heading = Element::create([
                'website_id' => 1,
                'page_id' => 1,
                'element_type' => 'typography.heading',
            ]);
            $heading->parent()->associate($column)->save();
        }

        $row->parent()->associate($root)->save();
    }
}
