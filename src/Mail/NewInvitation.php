<?php

namespace KraftHaus\WebClip\Mail\Invitations;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use KraftHaus\WebClip\Eloquent\Models\User;
use KraftHaus\WebClip\Eloquent\Models\Team;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewInvitation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * The user instance.
     *
     * @var \KraftHaus\WebClip\Eloquent\Models\User
     */
    protected $user;

    /**
     * The team instance.
     *
     * @var \KraftHaus\WebClip\Eloquent\Models\Team
     */
    protected $team;

    /**
     * Create a new message instance.
     *
     * @param  \KraftHaus\WebClip\Eloquent\Models\User $user
     * @param  \KraftHaus\WebClip\Eloquent\Models\Team $team
     * @return void
     */
    public function __construct(User $user, Team $team)
    {
        $this->user = $user;
        $this->team = $team;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('webclip::emails.team.invitation.new');
    }
}
