<?php

namespace KraftHaus\WebClip\Tests\Unit\Model;

use KraftHaus\WebClip\Tests\TestCase;
use KraftHaus\WebClip\Eloquent\Models\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use KraftHaus\WebClip\Eloquent\Models\CollectionField;

class CollectionFieldTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_belongs_to_a_collection()
    {
        $field = factory(CollectionField::class)->create();

        $this->assertNotNull($field->collection);
        $this->assertInstanceOf(Collection::class, $field->collection);
    }
}
