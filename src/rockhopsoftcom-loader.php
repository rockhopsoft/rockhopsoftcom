<?php
use RockHopSoft\RockHopSoftCom\Controllers\RockHopSoftComGlobals;

/**
 * Load a global helper object which is extendable
 * by customized installations of Survloop.
 *
 * @return RockHopSoft\Survloop\Controllers\Globals\Globals
 */
if (!function_exists('rock')) {
    function rock()
    {
        if (!isset($GLOBALS["CUST"])) {
            $GLOBALS["CUST"] = new RockHopSoftComGlobals;
        }
        return $GLOBALS["CUST"];
    }
}