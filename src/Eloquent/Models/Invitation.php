<?php

namespace KraftHaus\WebClip\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    /**
     * Get the team that owns the invitation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    /**
     * Determine if the coupon is expired.
     *
     * @return bool
     */
    public function isExpired()
    {
        return now()->subWeek()->gte($this->created_at);
    }
}
