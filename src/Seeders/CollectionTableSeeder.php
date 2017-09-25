<?php

namespace KraftHaus\WebClip\Seeders;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use KraftHaus\WebClip\Eloquent\Models\CollectionEntry;
use KraftHaus\WebClip\Eloquent\Models\CollectionValue;
use KraftHaus\WebClip\Eloquent\Models\CollectionField;

class CollectionTableSeeder extends Seeder
{
    /**
     * Run the database seeder.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('collections')->insert([
            'website_id' => 1,
            'uuid' => Uuid::uuid4()->toString(),
            'name' => 'Blog Posts',
            'plural_name' => 'Blog Posts',
            'singular_name' => 'Blog Post',
            'slug' => 'post',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        CollectionField::create([
            'website_id' => 1,
            'collection_id' => 1,
            'field_type' => 'text',
            'label' => 'Post Body',
            'data' => [
                'multiline' => true,
            ],
            'is_required' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        CollectionField::create([
            'website_id' => 1,
            'collection_id' => 1,
            'field_type' => 'text',
            'label' => 'Post Summary',
            'data' => [
                'multiline' => true,
            ],
            'is_required' => true,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        CollectionEntry::create([
            'website_id' => 1,
            'collection_id' => 1,
            'name' => 'My Awesome Blog Post',
            'slug' => 'my-awesome-blog-post',
            'activated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        CollectionValue::create([
            'website_id' => 1,
            'collection_id' => 1,
            'collection_field_id' => 1,
            'collection_entry_id' => 1,
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas feugiat mi nec sapien ultrices aliquam. Pellentesque elementum aliquam ultrices. Pellentesque quis justo non urna efficitur vestibulum. Morbi et felis neque. Donec id lacus luctus, commodo orci id, tincidunt erat. Fusce eu tristique nisi. Duis lacinia purus sit amet metus feugiat, et vestibulum lectus bibendum.

Integer dictum risus eu ornare ullamcorper. Sed pulvinar lorem fringilla nunc malesuada, in tincidunt arcu ultrices. Maecenas id mi purus. Nulla mattis dictum ex id interdum. Integer id efficitur mauris, sed semper metus. Integer suscipit in urna vitae cursus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed porta, libero id condimentum lacinia, orci lacus congue purus, et ullamcorper neque nunc molestie eros. Proin sem orci, tincidunt nec justo sit amet, sodales consectetur augue. Morbi egestas nisi sit amet fringilla dictum. Ut non odio vel nulla porttitor aliquam in et nibh. Sed sapien lacus, tempor dignissim sem in, feugiat rutrum massa. Duis tristique pharetra mi, in elementum odio bibendum sed. Mauris auctor euismod ipsum sit amet feugiat. Fusce et bibendum lacus.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        CollectionValue::create([
            'website_id' => 1,
            'collection_id' => 1,
            'collection_field_id' => 2,
            'collection_entry_id' => 1,
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas feugiat mi nec sapien ultrices aliquam. Pellentesque elementum aliquam ultrices. Pellentesque quis justo non urna efficitur vestibulum. Morbi et felis neque. Donec id lacus luctus, commodo orci id, tincidunt erat. Fusce eu tristique nisi. Duis lacinia purus sit amet metus feugiat, et vestibulum lectus bibendum.',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
