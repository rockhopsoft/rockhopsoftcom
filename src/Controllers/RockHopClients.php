<?php
/**
  * RockHopSoftCom extends the Survloop main branching-tree engine.
  *
  * Survloop.org
  * @package  rockhopsoft/rockhopsoftcom
  * @author  Morgan Lesko <rockhoppers@runbox.com>
  * @since 0.0
  */
namespace RockHopSoft\RockHopSoftCom\Controllers;

use App\Models\RHClients;
use RockHopSoft\RockHopSoftCom\Controllers\RockHopQuotes;
use RockHopSoft\RockHopSoftCom\Controllers\DataWraps\ClientWrap;

class RockHopClients extends RockHopQuotes
{

    protected function loadClients()
    {
        if (!isset($this->v["clients"])) {
            $this->v["clients"] = [];
        }
        if (sizeof($this->v["clients"]) == 0) {
            $chk = RHClients::whereNotNull('cli_name')
                ->where('cli_name', 'NOT LIKE', '')
                ->orderBy('cli_name', 'asc')
                ->get();
            if ($chk && sizeof($chk) > 0) {
                foreach ($chk as $cli) {
                    $this->v["clients"][] = new ClientWrap($cli);
                }
            }
        }
        return $this->v["clients"];
    }

    protected function printClientMgmt()
    {
        $this->loadClients();
        return view(
            'vendor.rockhopsoftcom.nodes.191-client-mgmt',
            $this->v
        )->render();
    }

}