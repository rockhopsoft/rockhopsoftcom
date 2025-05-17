<?php
/**
  * RockHopSoftComGlobals can be called via rock()->function_name().
  *
  * Survloop.org
  * @package  rockhopsoft/rockhopsoftcom
  * @author  Morgan Lesko <rockhoppers@runbox.com>
  * @since 0.0
  */
namespace RockHopSoft\RockHopSoftCom\Controllers;

use App\Models\RHQuoteSolution;
use RockHopSoft\RockHopSoftCom\Controllers\DataWraps\SolutionWraps;

class RockHopSoftComGlobals
{
    public $sols = null;

    public function getSolutions()
    {
        if (!$this->sols || $this->sols === null) {
            $this->sols = new SolutionWraps;
            $defs  = [ 852, 797, 798, 799, 800, 804 ];
            foreach ($defs as $def) {
                $this->sols->addSolDef($def);
            }
        }
        return $this->sols;
    }

    public function solDefPrintOffer($solDef)
    {
        if ($solDef == 852) {       // NextCloud
            return $this->getRockOfferBlade('server-support-nextcloud');
        } elseif ($solDef == 797) { // ONLYOFFICE
            return $this->getRockOfferBlade('server-support-onlyoffice');
        } elseif ($solDef == 798) { // Mattermost
            return $this->getRockOfferBlade('server-support-mattermost');
        } elseif ($solDef == 804) { // Passbolt
            return $this->getRockOfferBlade('server-support-passbolt');
        } elseif ($solDef == 799) { // Jitsi
            return $this->getRockOfferBlade('server-support-jitsi');
        } elseif ($solDef == 800) { // WordPress
            return $this->getRockOfferBlade('server-support-wordpress');
        } elseif ($solDef == 802) { // Email
            return $this->getRockOfferBlade('server-support-email');
        }
        return '';
    }

    public function getRockOfferBlade($blade)
    {
        $blade = 'vendor.rockhopsoftcom.offers.' . $blade;
        return view($blade, [ "sols" => $this->getSolutions() ])->render();
    }

    public function getRockBlade($blade)
    {
        $blade = 'vendor.rockhopsoftcom.nodes.' . $blade;
        return view($blade)->render();
    }
}