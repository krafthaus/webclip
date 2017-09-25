<?php

namespace KraftHaus\WebClip\Tests\Unit\Model;

use KraftHaus\WebClip\Tests\TestCase;
use KraftHaus\WebClip\Eloquent\Models\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use KraftHaus\WebClip\Eloquent\Models\CollectionEntry;
use KraftHaus\WebClip\Eloquent\Models\CollectionField;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class CollectionTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_many_fields()
    {
        $collection = factory(Collection::class)->create();

        factory(CollectionField::class, 5)->create([
            'collection_id' => $collection->id,
        ]);

        $fields = $collection->fields;

        $this->assertCount(5, $fields);
        $this->assertInstanceOf(EloquentCollection::class, $fields);
    }

    /** @test */
    public function it_has_many_entries()
    {
        $collection = factory(Collection::class)->create();

        factory(CollectionEntry::class, 5)
            ->states('activated')
            ->create([
                'collection_id' => $collection->id,
            ]);

        $entries = $collection->entries;

        $this->assertCount(5, $entries);
        $this->assertInstanceOf(EloquentCollection::class, $entries);
    }
}
