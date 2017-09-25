<?php

namespace KraftHaus\WebClip\Tests\Unit\Repository;

use Illuminate\Support\Collection;
use KraftHaus\WebClip\Tests\TestCase;
use KraftHaus\WebClip\Eloquent\Models\Website;
use KraftHaus\WebClip\Contracts\Website\Repository;
use KraftHaus\WebClip\Repositories\WebsiteRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class WebsiteRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_can_create_a_new_repository_instance()
    {
        $this->assertInstanceOf(WebsiteRepository::class, app(Repository::class));
    }

    /**
     * @covers \KraftHaus\WebClip\Repositories\WebsiteRepository::getAllActiveWebsites
     * @test
     */
    public function it_can_get_all_active_websites()
    {
        $repository = app(Repository::class);

        factory(Website::class, 3)->create();
        factory(Website::class, 5)->states('activated')->create();

        $websites = $repository->getAllActiveWebsites();

        $this->assertNotNull($websites);
        $this->assertCount(5, $websites);
        $this->assertInstanceOf(Collection::class, $websites);
    }

    /**
     * @covers \KraftHaus\WebClip\Repositories\WebsiteRepository::getOnlyDeactivatedWebsites
     * @test
     */
    public function it_can_get_only_deactivated_websites()
    {
        $repository = app(Repository::class);

        factory(Website::class, 3)->create();
        factory(Website::class, 5)->states('activated')->create();

        $websites = $repository->getOnlyDeactivatedWebsites();

        $this->assertNotNull($websites);
        $this->assertCount(3, $websites);
        $this->assertInstanceOf(Collection::class, $websites);
    }

    /**
     * @covers \KraftHaus\WebClip\Repositories\WebsiteRepository::createWebsite
     * @test
     */
    public function it_can_create_website()
    {
        $repository = app(Repository::class);

        $website = $repository->createWebsite(
            factory(Website::class)->raw()
        );

        $this->assertNotNull($website);
        $this->assertInstanceOf(Website::class, $website);
    }

    /**
     * @covers \KraftHaus\WebClip\Repositories\WebsiteRepository::getWebsiteByDomain
     * @test
     */
    public function it_can_get_website_by_domain()
    {
        $repository = app(Repository::class);

        factory(Website::class)
            ->states('activated')
            ->create(['domain' => 'test.com']);

        $website = $repository->getWebsiteByDomain('test.com');

        $this->assertNotNull($website);
        $this->assertInstanceOf(Website::class, $website);
    }
}
