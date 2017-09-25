<?php

use KraftHaus\WebClip\Support\URL;

if (! function_exists('url_slug')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $url
     * @param  string  $separator
     * @param  string  $language
     * @return string
     */
    function url_slug($url, $separator = '-', $language = 'en')
    {
        return URL::slug($url, $separator, $language);
    }
}
