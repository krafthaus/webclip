<?php

namespace KraftHaus\WebClip;

use Illuminate\Database\Schema\Blueprint;

trait Macroables
{
    /**
     * All of the available WebClip macros.
     *
     * @var array
     */
    protected $macros = [
        'Blueprint',
    ];

    /**
     * @return void
     */
    public function bindBlueprintMacros()
    {
        Blueprint::macro('activatable', function () {
            $this->timestamp('activated_at')->nullable();
        });
    }

    /**
     * Get the name to the macro binding method.
     *
     * @param  string $macro
     * @return string
     */
    protected function getMacroMethod($macro)
    {
        return 'bind'.studly_case($macro).'Macros';
    }
}
