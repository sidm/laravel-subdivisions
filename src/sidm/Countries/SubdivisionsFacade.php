<?php

namespace Webpatser\Subdivisions;

use Illuminate\Support\Facades\Facade;

/**
 * SubdivisionsFacade
 *
 */ 
class SubdivisionsFacade extends Facade {
 
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'subdivisions'; }
 
}