<?php
/**
  *
  *
  * Survloop - All Our Data Are Belong
  * @package  rockhopsoft/survloop
  * @author  Morgan Lesko <rockhoppers@runbox.com>
  * @since  v0.4.0
  */
namespace RockHopSoft\RockHopSoftCom\Controllers\DataWraps;

class BigTechWraps
{
    public $bigs = [];

    /**
     * Load wrapper for uploaded survey files with relevant info.
     *
     * @return void
     */
    public function __construct($bigs = [])
    {
        $this->bigs = [];
        if (sizeof($bigs) > 0) {
            foreach ($bigs as $big) {
                if (isset($big->big_relation)
                    && intVal($big->big_relation) > 0) {
                    $this->bigs[] = new BigTechWrap($big);
                }
            }
        }
        return $this->bigs;
    }

}