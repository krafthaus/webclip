<?php

namespace KraftHaus\WebClip\Contracts\Team;

use KraftHaus\WebClip\Eloquent\Models\User;

interface Repository
{
    /**
     * Create a new model and return the instance.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\User $user
     * @param  array $data
     * @return \Illuminate\Database\Eloquent\Model|$this
     */
    public function createTeam(User $user, array $data);
}
