<?php

namespace KraftHaus\WebClip\Eloquent;

use KraftHaus\WebClip\Eloquent\Models\Team;
use KraftHaus\WebClip\Events\User\JoinedTeam;

trait CanJoinTeams
{
    /**
     * Get all of the teams that the user belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class)
                    ->withPivot(['role'])
                    ->orderBy('name', 'asc');
    }

    /**
     * Get all of the teams that the user owns.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function ownedTeams()
    {
        return $this->teams()->where('owner_id', $this->getKey());
    }

    /**
     * Get all of the pending invitations for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    /**
     * Determine if the user is a member of any teams.
     *
     * @return bool
     */
    public function hasTeams()
    {
        return count($this->team) > 0;
    }

    /**
     * Join a team with the given ID.
     *
     * @param  int $teamId
     * @return void
     */
    public function joinTeamById($teamId)
    {
        $this->teams()->attach([$teamId], ['role' => config('webclip.roles.default')]);

        $this->currentTeam();

        event(new JoinedTeam($this, $this->teams()->find($teamId)));
    }

    /**
     * Accessor for the currentTeam method.
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function getCurrentTeamAttribute()
    {
        return $this->currentTeam();
    }

    /**
     * Get the team that the user is currently viewing.
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function currentTeam()
    {
        if (is_null($this->current_team_id) && $this->hasTeams()) {
            $this->switchToTeam($this->teams->first());

            return $this->currentTeam();
        } elseif (! is_null($this->current_team_id)) {
            $currentTeam = $this->teams->find($this->current_team_id);

            return $currentTeam ?: $this->refreshCurrentTeam();
        }
    }

    /**
     * Switch the current team for the user.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Team $team
     * @return void
     */
    public function switchToTeam($team)
    {
        $this->current_team_id = $team->getKey();

        $this->save();
    }

    /**
     * Refresh the current team for the user.
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function refreshCurrentTeam()
    {
        $this->current_team_id = null;

        $this->save();

        return $this->currentTeam();
    }

    /**
     * Determine if the given team is owned by the user.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Team $team
     * @return bool
     */
    public function ownsTeam($team)
    {
        if (is_null($team->owner_id) || is_null($this->id)) {
            return false;
        }

        return $this->id === $team->owner_id;
    }

    /**
     * Get the user's role on a given team.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\Team $team
     * @return string|void
     */
    public function teamRole(Team $team = null)
    {
        if (! $team) {
            $team = $this->teams->find($this->getKey());
        }

        return $team->pivot->role;
    }
}
