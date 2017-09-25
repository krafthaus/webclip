<?php

namespace KraftHaus\WebClip\Eloquent;

use Carbon\Carbon;
use KraftHaus\WebClip\Eloquent\Scopes\ActivatableScope;

trait Activatable
{
    /**
     * Boot the activatable trait for a model.
     *
     * @return void
     */
    public static function bootActivatable()
    {
        static::addGlobalScope(new ActivatableScope);
    }

    /**
     * Activate a activatable model instance.
     *
     * @return bool|null
     */
    public function activate()
    {
        // If the activating event does not return false, we will proceed with this
        // activation operation. Otherwise, we bail out so the developer will stop
        // the activation totally. We will set the activated timestamp and save.
        if ($this->fireModelEvent('activating') === false) {
            return false;
        }

        $this->{$this->getActivatedAtColumn()} = Carbon::now();

        // Once we have saved the model, we will fire the "activated" event so this
        // developer will do anything they need to after a activation operation is
        // totally finished. Then we will return the result of the save call.
        $this->exists = true;

        $result = $this->save();

        $this->fireModelEvent('activated', false);

        return $result;
    }

    /**
     * Deactivate a activatable model instance.
     *
     * @return bool|null
     */
    public function deactivate()
    {
        // If the "deactivating" event does not return false, we will proceed with this
        // deactivation operation. Otherwise, we bail out so the developer will stop
        // the deactivation totally. We will clear the activated timestamp and save.
        if ($this->fireModelEvent('deactivating') === false) {
            return false;
        }

        $this->{$this->getActivatedAtColumn()} = null;

        // Once we have saved the model, we will fire the "deactivated" event so this
        // developer will do anything they need to after a deactivation operation is
        // totally finished. Then we will return the result of the save call.
        $this->exists = true;

        $result = $this->save();

        $this->fireModelEvent('deactivated', false);

        return $result;
    }

    /**
     * Register an activating model event with the dispatcher.
     *
     * @param  \Closure|string $callback
     * @return void
     */
    public static function activating($callback)
    {
        static::registerModelEvent('activating', $callback);
    }

    /**
     * Register an activated model event with the dispatcher.
     *
     * @param  \Closure|string $callback
     * @return void
     */
    public static function activated($callback)
    {
        static::registerModelEvent('activated', $callback);
    }

    /**
     * Register an deactivating model event with the dispatcher.
     *
     * @param  \Closure|string $callback
     * @return void
     */
    public static function deactivating($callback)
    {
        static::registerModelEvent('deactivating', $callback);
    }

    /**
     * Register an deactivated model event with the dispatcher.
     *
     * @param  \Closure|string $callback
     * @return void
     */
    public static function deactivated($callback)
    {
        static::registerModelEvent('deactivated', $callback);
    }

    /**
     * Get the name of the "activated at" column.
     *
     * @return string
     */
    public function getActivatedAtColumn()
    {
        return 'activated_at';
    }

    /**
     * Get the fully qualified "activated at" column.
     *
     * @return string
     */
    public function getQualifiedActivatedAtColumn()
    {
        return $this->getTable().'.'.$this->getActivatedAtColumn();
    }

    /**
     * Indicates if this instance is activated.
     *
     * @return bool
     */
    public function getIsActivatedAttribute()
    {
        return $this->{$this->getActivatedAtColumn()} !== null;
    }
}
