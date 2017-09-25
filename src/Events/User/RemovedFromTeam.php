<?php

namespace KraftHaus\WebClip\Events\User;

use Illuminate\Queue\SerializesModels;
use KraftHaus\WebClip\Eloquent\Models\Team;
use Illuminate\Contracts\Auth\Authenticatable;

class RemovedFromTeam
{
    use SerializesModels;

    /**
     * The user instance.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $user;

    /**
     * The team instance.
     *
     * @var \KraftHaus\WebClip\Eloquent\Models\Team
     */
    public $team;

    /**
     * Create a new event instance.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  \KraftHaus\WebClip\Eloquent\Models\Team $team
     * @return void
     */
    public function __construct(Authenticatable $user, Team $team)
    {
        $this->user = $user;
        $this->team = $team;
    }
}
