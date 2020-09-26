<?php
/**
  * RockHopSoftComFacade in Laravel is a class which redirects static 
  * method calls to the dynamic methods of an underlying class
  *
  * Survloop - All Our Data Are Belong
  * @package  rockhopsoft/survloop
  * @author  Morgan Lesko <rockhoppers@runbox.com>
  * @since 0.2.8
  */
namespace RockHopSoft\RockHopSoftCom;

use Illuminate\Support\Facades\Facade;

class RockHopSoftComFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'rockhopsoftcom';
    }
}
