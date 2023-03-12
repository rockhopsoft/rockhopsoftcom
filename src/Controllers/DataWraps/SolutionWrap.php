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

use App\Models\RHSolution;
// use RockHopSoft\Survloop\Controllers\DataWraps\DataWrap;

class SolutionWrap // extends DataWrap
{
    public $quoteID  = 0;
    public $solDef   = 0;

    public $feeOnce  = 0;
    public $feeMonth = 0;
    public $feeHost  = 0;

    /**
     * Load wrapper for uploaded survey files with relevant info.
     *
     * @param  App\Models\RHQuoteBigTech  $solRow
     * @param  int  $solDef
     * @return void
     */
    public function __construct($solRow = NULL, $solDef = -3)
    {
        if ($solDef > 0 && (!$solRow || !isset($solRow->sol_id))) {
            $this->solDef = $solDef;
        } elseif ($solRow && isset($solRow->sol_id)) {
            if (isset($solRow->sol_quote_id)
                && intVal($solRow->sol_quote_id) > 0) {
                $this->quoteID = intVal($solRow->sol_quote_id);
            }
            if (isset($solRow->sol_def_id)
                && intVal($solRow->sol_def_id) > 0) {
                $this->solDef = intVal($solRow->sol_def_id);
            }
        }
        if ($this->solDef > 0) {
            $sol = RHSolution::where('solu_def', $this->solDef)
                ->first();
            if ($sol && isset($sol->solu_id)) {
                $this->feeOnce  = (1*$sol->solu_offer_fee_setup);
                $this->feeMonth = (1*$sol->solu_offer_fee_month);
                $this->feeHost  = (1*$sol->solu_hosting_fee_month);
            }
        }
    }

    public function printName()
    {
        if ($this->solDef > 0) {
            return sldefs()->getVal('Software Solutions', $this->solDef);
        }
        return '';
    }

}