<?php

namespace KraftHaus\WebClip\Support;

use Illuminate\Support\Str;

class URL
{
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $url
     * @param  string  $separator
     * @param  string  $language
     * @return string
     */
    public static function slug($url, $separator = '-', $language = 'en')
    {
        $url = Str::ascii($url, $language);

        // Convert all dashes/underscores into separator
        $flip = $separator == '-' ? '_' : '-';

        $url = preg_replace('!['.preg_quote($flip).']+!u', $separator, $url);

        // Replace @ with the word 'at'
        $url = str_replace('@', $separator.'at'.$separator, $url);

        // Remove all characters that are not the separator, letters, numbers, or whitespace.
        $url = preg_replace('![^'.preg_quote($separator).'\pL\pN\/\s]+!u', '', mb_strtolower($url));

        // Replace all separator characters and whitespace by a single separator
        $url = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $url);

        return trim($url, $separator);
    }
}
