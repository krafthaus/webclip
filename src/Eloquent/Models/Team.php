<?php

namespace KraftHaus\WebClip\Eloquent\Models;

use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use KraftHaus\WebClip\Events\User\RemovedFromTeam;
use KraftHaus\WebClip\Mail\Invitations\NewInvitation;
use KraftHaus\WebClip\Mail\Invitations\ExistingInvitation;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get all of the users that belong to the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(config('auth.providers.users.model'))
                    ->withPivot('role');
    }

    /**
     * Get the owner of the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'owner_id');
    }

    /**
     * Get all of the pending invitations for the team.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invitations()
    {
        return $this->hasMany(Invitation::class)
                    ->orderBy('created_at', 'desc');
    }

    /**
     * Invite a user to the team by e-mail address.
     *
     * @param  string $email
     * @return \KraftHaus\WebClip\Eloquent\Models\Invitation
     */
    public function inviteUserByEmail($email)
    {
        $invitation = $this->invitations()->where('email', $email)->first();

        if (! $invitation) {
            $model = config('auth.providers.users.model');

            $invitedUser = $model::where('email', $email)->first();

            $invitation = $this->invitations()->create([
                'user_id' => $invitedUser ? $invitedUser->id : null,
                'email' => $email,
                'token' => str_random(40),
            ]);
        }

        $email = $invitation->user_id
            ? ExistingInvitation::class
            : NewInvitation::class;

        Mail::to($invitation->email)->send(new $email($invitation));

        return $invitation;
    }

    public function removeUserById($userId)
    {
        $this->users()->detach([$userId]);

        $model = config('auth.providers.users.model');

        $removedUser = $model::find($userId);

        if ($removedUser) {
            $removedUser->refreshCurrentTeam();
        }

        event(new RemovedFromTeam($removedUser, $this));
    }
}
