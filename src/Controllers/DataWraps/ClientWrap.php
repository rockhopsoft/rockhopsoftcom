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
use RockHopSoft\RockHopSoftCom\Controllers\DataWraps\ClientProductWrap;
use RockHopSoft\Survloop\Controllers\DataWraps\DataWrap;

class ClientWrap extends DataWrap
{
    public $sols = [];

    /**
     * Load wrapper for uploaded survey files with relevant info.
     *
     * @param  App\Models\RHQuoteBigTech  $cliRow
     * @return void
     */
    public function __construct($cliRow = NULL)
    {
        $this->coreAbbr = 'qr_';
        $this->rec = $cliRow;
        if ($this->rec && isset($this->rec->cli_id)) {
            $this->loadRec();
            $this->loadSols();
        }
    }

    private function loadRec()
    {
        $this->id = $this->rec->cli_id;
        if (isset($this->rec->cli_name)) {
            $this->name = trim($this->rec->cli_name);
        }
    }

    private function loadSols()
    {
        $chk = RHQuoteSolution::where('sol_quote_id', $this->id)
            ->orderBy('sol_id', 'asc')
            ->get();
        if ($chk && sizeof($chk) > 0) {
            foreach ($chk as $sol) {
                $this->sols[] = new ClientProductWrap($sol);
            }
        }
    }

}