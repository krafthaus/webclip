<?php

namespace KraftHaus\WebClip\Tests\Unit\Repository;

use KraftHaus\WebClip\Tests\TestCase;
use KraftHaus\WebClip\Eloquent\Models\Website;
use Illuminate\Pagination\LengthAwarePaginator;
use KraftHaus\WebClip\Eloquent\Models\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use KraftHaus\WebClip\Eloquent\Models\CollectionEntry;
use KraftHaus\WebClip\Contracts\Collection\Repository;
use KraftHaus\WebClip\Repositories\CollectionRepository;

class CollectionRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_can_create_a_new_repository_instance()
    {
        $this->assertInstanceOf(CollectionRepository::class, app(Repository::class));
    }

    /**
     * @covers \KraftHaus\WebClip\Repositories\CollectionRepository::createCollection
     * @test
     */
    public function it_can_create_collection()
    {
        $repository = app(Repository::class);

        $collection = $repository->createCollection(
            factory(Collection::class)->raw()
        );

        $this->assertInstanceOf(Collection::class, $collection);
    }

    /**
     * @covers \KraftHaus\WebClip\Repositories\CollectionRepository::getAllCollectionsByWebsite
     * @test
     */
    public function it_can_get_all_collections_by_website()
    {
        $repository = app(Repository::class);
        $website = factory(Website::class)->create();

        factory(Collection::class, 5)->create([
            'website_id' => $website->id,
        ]);

        $collections = $repository->getAllCollectionsByWebsite($website);

        $this->assertNotNull($collections);
        $this->assertCount(5, $collections);
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $collections);
    }

    /**
     * @covers \KraftHaus\WebClip\Repositories\CollectionRepository::getAllEntriesByWebsiteAndCollection
     * @test
     */
    public function it_can_get_all_entries_by_collection()
    {
        $repository = app(Repository::class);
        $collection = factory(Collection::class)->create();

        factory(CollectionEntry::class, 5)
            ->states('activated')
            ->create(['collection_id' => $collection->id]);

        $entries = $repository->getAllEntriesByCollection($collection);

        $this->assertNotNull($entries);
        $this->assertCount(5, $entries);
        $this->assertInstanceOf(LengthAwarePaginator::class, $entries);
    }

    /**
     * @covers \KraftHaus\WebClip\Repositories\CollectionRepository::getCollectionByParts
     * @test
     */
    public function it_can_get_collection_by_parts()
    {
        $repository = app(Repository::class);

        $collection = factory(Collection::class)->create();
        $entry = factory(CollectionEntry::class)->create([
            'collection_id' => $collection->id,
        ]);

        $result = $repository->getCollectionByParts(
            $collection->slug, $entry->slug
        );

        $this->assertNotNull($result);
        $this->assertInstanceOf(Collection::class, $result);
    }
}
