<?php

namespace KraftHaus\WebClip\Events\Team;

use Illuminate\Queue\SerializesModels;
use KraftHaus\WebClip\Eloquent\Models\Team;

class Created
{
    use SerializesModels;

    /**
     * The team instance.
     *
     * @var \KraftHaus\WebClip\Eloquent\Models\Team
     */
    public $team;

    /**
     * Create a new team created event instance.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Team $team
     * @return void
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
    }
}
