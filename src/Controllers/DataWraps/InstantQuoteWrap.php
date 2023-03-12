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

use App\Models\RHQuoteBigTech;
use App\Models\RHQuoteSolution;
use RockHopSoft\RockHopSoftCom\Controllers\DataWraps\BigTechWrap;
use RockHopSoft\RockHopSoftCom\Controllers\DataWraps\SolutionWrap;
use RockHopSoft\Survloop\Controllers\DataWraps\DataWrap;

class InstantQuoteWrap extends DataWrap
{
    public $timeSub = null;
    public $bigs = [];
    public $sols = [];

    /**
     * Load wrapper for uploaded survey files with relevant info.
     *
     * @param  App\Models\RHQuoteBigTech  $solRow
     * @return void
     */
    public function __construct($quoRow = NULL)
    {
        $this->coreAbbr = 'qr_';
        $this->rec = $quoRow;
        if ($this->rec && isset($this->rec->qr_id)) {
            $this->loadRec();
            $this->loadBigs();
            $this->loadSols();
        }
    }

    private function loadRec()
    {
        $this->id = $this->rec->qr_id;
        if (isset($this->rec->qr_submitted)) {
            $this->timeSub = strtotime($this->rec->qr_submitted);
        }
        if ($this->timeSub && $this->timeSub > 0) {
            $this->name .= $this->timeSub;
        }
        if (isset($this->rec->qr_name)) {
            $this->name .= ' ' . $this->rec->qr_name;
        }
        $this->name = trim($this->name);
    }

    private function loadBigs()
    {
        $chk = RHQuoteBigTech::where('big_quote_id', $this->id)
            ->orderBy('big_id', 'asc')
            ->get();
        if ($chk && sizeof($chk) > 0) {
            foreach ($chk as $big) {
                $this->bigs[] = new BigTechWrap($big);
            }
        }
    }

    private function loadSols()
    {
        $chk = RHQuoteSolution::where('sol_quote_id', $this->id)
            ->orderBy('sol_id', 'asc')
            ->get();
        if ($chk && sizeof($chk) > 0) {
            foreach ($chk as $sol) {
                $this->sols[] = new SolutionWrap($sol);
            }
        }
    }

    public function getBigsUsed()
    {
        $bigs = [];
        if (sizeof($this->bigs) > 0) {
            foreach ($this->bigs as $big) {
                if (in_array($big->relation, [792, 793])) {
                    $bigs[] = $big;
                }
            }
        }
        return $bigs;
    }

    public function getRepliedDateSlashes()
    {
        if (isset($this->rec->qr_date_replied)
            && trim($this->rec->qr_date_replied) != '') {
            return date('m/d/Y', strtotime($this->rec->qr_date_replied));
        }
        return '';
    }

}