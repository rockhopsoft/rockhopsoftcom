<?php
/**
  *
  *
  * Survloop.org
  * @package  rockhopsoft/rockhopsoftcom
  * @author  Morgan Lesko <rockhoppers@runbox.com>
  * @since 0.0
  */
namespace RockHopSoft\RockHopSoftCom\Controllers;

use Auth;
use App\Models\RHQuoteRequest;
use App\Models\SLDefinitions;
use RockHopSoft\Survloop\Controllers\Admin\AdminMenu;
use RockHopSoft\Survloop\Controllers\Admin\AdminMenuLink;

class RockHopSoftComAdminMenu extends AdminMenu
{
    public function loadNavMenu($currUser = null, $currPage = '')
    {
        $this->addNavMenuSetVars($currUser, $currPage);
        if ($this->currUser->hasRole('administrator|staff|databaser|brancher')) {
            return $this->addNavMenuBasics($this->loadAdmMenuAdmin());
        } elseif ($this->currUser->hasRole('partner|apirobot')) {
            return $this->loadAdmMenuPartner();
        }
        return [ $this->addNavMenuHome() ];
    }

    protected function getLeadAlert()
    {
        $leadCnt = 0;
        $chk = RHQuoteRequest::whereNotNull('qr_submitted')
            ->where(function($query) {
                $query->whereNull('qr_date_replied')
                    ->orWhere('qr_date_replied', 'LIKE', '');
            })
            ->get();
        if ($chk) {
            $leadCnt = sizeof($chk);
        }
        if ($leadCnt > 0) {
            return ' <span class="badge badge-pill badge-danger mL5"'
                . ' style="background: #EC2327;">'
                . number_format($leadCnt) . '</span>';
        }
        return '';
    }

    protected function loadAdmMenuAdmin()
    {
        $treeMenu   = [];
        $treeMenu[] = $this->addNavMenuHome();
        $treeMenu[] = new AdminMenuLink(
            '/dash/client-mgmt',
            'Clients',
            '<i class="fa-solid fa-handshake"></i>'
        );
        $treeMenu[] = new AdminMenuLink(
            '/dash/website-inquries',
            'Leads' . $this->getLeadAlert(),
            '<i class="fa-solid fa-id-card"></i>'
        );
        return $treeMenu;
    }

    protected function loadAdmMenuPartner()
    {
        $treeMenu   = [];
        $treeMenu[] = $this->addNavMenuHome();

        return $treeMenu;
    }

}