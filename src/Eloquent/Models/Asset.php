<?php

namespace KraftHaus\WebClip\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use KraftHaus\WebClip\Eloquent\BelongsToWebsite;

class Asset extends Model
{
    use BelongsToWebsite;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename', 'filesize', 'url',
    ];

    /**
     * Get the formatted filesize of the file.
     *
     * @return string
     */
    public function getFormattedFilesizeAttribute()
    {
        $bytes = log($this->getAttribute('filesize'), 1024);

        $suffix = [
            'B', 'KB', 'MB', 'GB', 'TB', 'PB'
        ][floor($bytes)];

        return round(pow(1024, $bytes - floor($bytes)), 2).$suffix;
    }
}
