<?php

namespace KraftHaus\WebClip\Repositories;

use KraftHaus\WebClip\Eloquent\Models\Team;
use KraftHaus\WebClip\Eloquent\Models\User;
use KraftHaus\WebClip\Contracts\Team\Repository;

class TeamRepository implements Repository
{
    /**
     * The website model.
     *
     * @var \KraftHaus\WebClip\Eloquent\Models\Website
     */
    protected $model;

    /**
     * Create a new collection repository instance.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Team $model
     * @return void
     */
    public function __construct(Team $model)
    {
        $this->model = $model;
    }

    /**
     * Create a new model and return the instance.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\User $user
     * @param  array $data
     * @return \Illuminate\Database\Eloquent\Model|$this
     */
    public function createTeam(User $user, array $data)
    {
        $team = new Team($data);

        $team->owner()->associate($user);

        $team->save();

        $user->teams()->attach(
            $team, ['role' => 'owner']
        );

        return $team;
    }
}
