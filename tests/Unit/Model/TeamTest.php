<?php

namespace KraftHaus\WebClip\Tests\Unit\Model;

use KraftHaus\WebClip\Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TeamTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_belongs_to_many_users()
    {
        $this->markTestIncomplete();
    }

    /** @test */
    public function it_has_an_owner()
    {
        $this->markTestIncomplete();
    }

    /** @test */
    public function it_has_many_invitations()
    {
        $this->markTestIncomplete();
    }

    /** @test */
    public function it_can_invite_a_user_by_email()
    {
        $this->markTestIncomplete();
    }

    /** @test */
    public function it_can_remove_a_user_by_id()
    {
        $this->markTestIncomplete();
    }
}
