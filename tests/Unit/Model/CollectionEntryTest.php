<?php

namespace KraftHaus\WebClip\Tests\Unit\Model;

use KraftHaus\WebClip\Tests\TestCase;
use KraftHaus\WebClip\Eloquent\Models\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use KraftHaus\WebClip\Eloquent\Models\CollectionEntry;
use KraftHaus\WebClip\Eloquent\Models\CollectionValue;

class CollectionEntryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_belongs_to_a_collection()
    {
        $entry = factory(CollectionEntry::class)
            ->states('activated')
            ->create();

        $this->assertNotNull($entry->collection);
        $this->assertInstanceOf(Collection::class, $entry->collection);
    }

    /** @test */
    public function it_has_many_values()
    {
        $entry = factory(CollectionEntry::class)
            ->states('activated')
            ->create();

        factory(CollectionValue::class)->create([
            'collection_entry_id' => $entry->id,
        ]);

        $this->assertNotNull($entry->values);
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $entry->values);
    }
}
