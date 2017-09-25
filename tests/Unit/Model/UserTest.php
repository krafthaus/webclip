<?php

namespace KraftHaus\WebClip\Tests\Unit\Model;

use KraftHaus\WebClip\Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @covers \KraftHaus\WebClip\Eloquent\Models\User::teams
     * @test
     */
    public function it_belongs_to_many_teams()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \KraftHaus\WebClip\Eloquent\Models\User::ownedTeams
     * @test
     */
    public function it_owns_one_or_more_teams()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \KraftHaus\WebClip\Eloquent\Models\User::invitations
     * @test
     */
    public function it_can_have_many_invitations()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \KraftHaus\WebClip\Eloquent\Models\User::hasTeams
     * @test
     */
    public function it_has_teams()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \KraftHaus\WebClip\Eloquent\Models\User::joinTeamById
     * @test
     */
    public function it_can_join_a_team_by_id()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \KraftHaus\WebClip\Eloquent\Models\User::currentTeam
     * @covers \KraftHaus\WebClip\Eloquent\Models\User::getCurrentTeamAttribute
     * @test
     */
    public function it_can_get_the_correct_current_team_attribute()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \KraftHaus\WebClip\Eloquent\Models\User::switchToTeam
     * @test
     */
    public function it_can_switch_to_a_team()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \KraftHaus\WebClip\Eloquent\Models\User::refreshCurrentTeam
     * @test
     */
    public function it_refreshes_current_team()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \KraftHaus\WebClip\Eloquent\Models\User::ownsTeam
     * @test
     */
    public function it_owns_a_specific_team()
    {
        $this->markTestIncomplete();
    }

    /**
     * @covers \KraftHaus\WebClip\Eloquent\Models\User::teamRole
     * @test
     */
    public function it_gets_the_role_for_a_specific_team()
    {
        $this->markTestIncomplete();
    }
}
