<?php

namespace KraftHaus\WebClip\Tests\Unit\Repository;

use Illuminate\Support\Collection;
use KraftHaus\WebClip\Tests\TestCase;
use KraftHaus\WebClip\Eloquent\Models\Page;
use KraftHaus\WebClip\Contracts\Element\Repository;
use KraftHaus\WebClip\Repositories\ElementRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ElementRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_can_create_a_new_repository_instance()
    {
        $this->assertInstanceOf(ElementRepository::class, app(Repository::class));
    }

    /**
     * @covers \KraftHaus\WebClip\Repositories\ElementRepository::getAllElements
     * @test
     */
    public function it_can_get_all_elements()
    {
        $repository = app(Repository::class);

        $elements = $repository->getAllElements();

        $this->assertNotNull($elements);
        $this->assertInstanceOf(Collection::class, $elements);
    }

    /**
     * @covers \KraftHaus\WebClip\Repositories\ElementRepository::getAllElementsByPage
     * @test
     */
    public function it_get_all_elements_by_page()
    {
        $repository = app(Repository::class);

        $page = factory(Page::class)->create();

        $page->elements()->create([
            'website_id' => $page->website_id,
            'element_type' => 'layout.section',
        ]);

        $elements = $repository->getAllElementsByPage($page);

        $this->assertNotNull($elements);
        $this->assertInstanceOf(Collection::class, $elements);
    }
}
