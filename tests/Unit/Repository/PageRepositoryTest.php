<?php

namespace KraftHaus\WebClip\Tests\Unit\Repository;

use Illuminate\Support\Collection;
use KraftHaus\WebClip\Tests\TestCase;
use KraftHaus\WebClip\Eloquent\Models\Website;
use KraftHaus\WebClip\Contracts\Page\Repository;
use KraftHaus\WebClip\Repositories\PageRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PageRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_can_create_a_new_repository_instance()
    {
        $this->assertInstanceOf(PageRepository::class, app(Repository::class));
    }

    /**
     * @covers \KraftHaus\WebClip\Repositories\PageRepository::getAllPagesByWebsite
     * @test
     */
    public function it_can_get_all_pages_by_website()
    {
        $repository = app(Repository::class);
        $website = factory(Website::class)
            ->states('activated')
            ->create();

        $pages = $repository->getAllPagesByWebsite($website);

        $this->assertNotNull($pages);
        $this->assertCount(2, $pages);
        $this->assertInstanceOf(Collection::class, $pages);
    }

    /**
     * @covers \KraftHaus\WebClip\Repositories\PageRepository::getPageByPath
     * @test
     */
    public function it_can_get_page_by_path()
    {
        $repository = app(Repository::class);
        $website = factory(Website::class)
            ->states('activated')
            ->create();

        $page = $repository->getPageByPath($website, '/');

        $this->assertNotNull($page);
        $this->assertNotNull($page->uuid);
        $this->assertFalse($page->is_folder);
        $this->assertEquals('Homepage', $page->name);
    }
}
