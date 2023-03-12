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

// use RockHopSoft\Survloop\Controllers\DataWraps\DataWrap;

class BigTechWrap // extends DataWrap
{
	public $quoteID  = 0;
    public $techDef  = 0;
    public $relation = 0;

    /**
     * Load wrapper for uploaded survey files with relevant info.
     *
     * @param  App\Models\RHQuoteBigTech  $bigRow
     * @return void
     */
    public function __construct($bigRow = NULL)
    {
        if ($bigRow && isset($bigRow->big_id)) {
            if (isset($bigRow->big_quote_id)
                && intVal($bigRow->big_quote_id) > 0) {
                $this->quoteID = intVal($bigRow->big_quote_id);
            }
            if (isset($bigRow->big_tech_def)
                && intVal($bigRow->big_tech_def) > 0) {
                $this->techDef = intVal($bigRow->big_tech_def);
            }
            if (isset($bigRow->big_relation)
                && intVal($bigRow->big_relation) > 0) {
                $this->relation = intVal($bigRow->big_relation);
            }
        }
    }

    public function printTechName()
    {
        if ($this->techDef > 0) {
            return sldefs()->getVal('Big Tech Platforms', $this->techDef);
        }
        return '';
    }

    public function printRelation()
    {
        if ($this->relation > 0) {
            return sldefs()->getVal('Big Tech Relationship', $this->relation);
        }
        return '';
    }

    public function isUnknown()
    {
        return ($this->relation == 796);
    }

    public function isFamiliar()
    {
        return !$this->isUnknown();
    }

    public function alternativeCurious()
    {
        return (in_array($this->relation, [795, 793]));
    }

    public function notAlternativeCurious()
    {
        return (in_array($this->relation, [794, 792]));
    }

    public function getSolDefs()
    {
        if (!$this->alternativeCurious()) {
            return [];
        }
        if ($this->techDef == 784) { // Gmail
            return [ 802 ];
        } elseif ($this->techDef == 785) { // Google Docs
            return [ 797 ];
        } elseif ($this->techDef == 786) { // Google Drive
            return [ 797 ];
        } elseif ($this->techDef == 787) { // Dropbox
            return [ 797 ];
        } elseif ($this->techDef == 788) { // Slack
            return [ 798 ];
        } elseif ($this->techDef == 791) { // Zoom
            return [ 799 ];
        } elseif ($this->techDef == 789) { // Asana
            return [ 797 ];
        } elseif ($this->techDef == 790) { // Salesforce
            return [ 797 ];
        } elseif ($this->techDef == 790) { // Password Managers
            return [ 804 ];
        }
        return [];
    }

}