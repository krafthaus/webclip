<?php

namespace KraftHaus\WebClip\Tests\Unit\Model;

use KraftHaus\WebClip\Tests\TestCase;
use KraftHaus\WebClip\Eloquent\Models\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use KraftHaus\WebClip\Eloquent\Models\CollectionEntry;
use KraftHaus\WebClip\Eloquent\Models\CollectionField;
use KraftHaus\WebClip\Eloquent\Models\CollectionValue;

class CollectionValueTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_belongs_to_a_collection()
    {
        $value = factory(CollectionValue::class)->create();

        $this->assertNotNull($value->collection);
        $this->assertInstanceOf(Collection::class, $value->collection);
    }

    /** @test */
    public function it_belongs_to_a_field()
    {
        $value = factory(CollectionValue::class)->create();

        $this->assertNotNull($value->field);
        $this->assertInstanceOf(CollectionField::class, $value->field);
    }

    /** @test */
    public function it_to_an_entry()
    {
        $value = factory(CollectionValue::class)->create();

        $this->assertNotNull($value->entry);
        $this->assertInstanceOf(CollectionEntry::class, $value->entry);
    }
}
