<?php

use KraftHaus\WebClip\Eloquent\Models\Page;
use KraftHaus\WebClip\Eloquent\Models\Website;
use KraftHaus\WebClip\Eloquent\Models\Collection;
use KraftHaus\WebClip\Eloquent\Models\CollectionEntry;
use KraftHaus\WebClip\Eloquent\Models\CollectionValue;
use KraftHaus\WebClip\Eloquent\Models\CollectionField;

$factory->define(Collection::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Blog Posts',
        'slug' => 'blog-posts',
        'website_id' => function () {
            $website = factory(Website::class)->create();
            $website->activate();

            return $website->getKey();
        }
    ];
});

$factory->define(CollectionEntry::class, function (Faker\Generator $faker) {
    return [
        'name' => 'my Awesome Blog Post',
        'website_id' => function () {
            return factory(Website::class)
                ->states('activated')
                ->create()
                ->getKey();
        },
        'collection_id' => function () {
            return factory(Collection::class)->create()->getKey();
        },
    ];
});

$factory->define(CollectionField::class, function (Faker\Generator $faker) {
    $fieldType = array_random(config('webclip.fields'));
    $website = factory(Website::class)
        ->states('activated')
        ->create();

    return [
        'field_type' => $fieldType,
        'label' => "Post {$fieldType}",
        'website_id' => function () use ($website) {
            return $website->id;
        },
        'collection_id' => function () use ($website) {
            return factory(Collection::class)->create([
                'website_id' => $website->id,
            ])->getKey();
        },
    ];
});

$factory->define(CollectionValue::class, function (Faker\Generator $faker) {
    $website = factory(Website::class)
        ->states('activated')
        ->create();

    $collection = factory(Collection::class)->create([
        'website_id' => $website->id,
    ]);

    $entry = factory(CollectionEntry::class)
        ->states('activated')
        ->create([
            'website_id' => $website->id,
            'collection_id' => $collection->id,
        ]);

    $field = factory(CollectionField::class)->create([
        'website_id' => $website->id,
        'collection_id' => $collection->id,
    ]);

    return [
        'website_id' => function () use ($website) {
            return $website->id;
        },
        'collection_id' => function () use ($collection) {
            return $collection->id;
        },
        'collection_entry_id' => function () use ($entry) {
            return $entry->id;
        },
        'collection_field_id' => function () use ($field) {
            return $field->id;
        },
        'value' => $faker->text(),
    ];
});

$factory->define(Website::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'domain' => $faker->domainName,
    ];
});

$factory->define(Page::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'slug' => '/',
        'website_id' => function () {
            return factory(Website::class)
                ->states('activated')
                ->create()
                ->getKey();
        },
    ];
});

$factory->state(Website::class, 'activated', ['activated_at' => now()]);
$factory->state(CollectionEntry::class, 'activated', ['activated_at' => now()]);
