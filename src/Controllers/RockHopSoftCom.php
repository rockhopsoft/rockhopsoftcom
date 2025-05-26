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

use DB;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SLIInstallations;
use App\Models\SLIInstallStats;
use RockHopSoft\RockHopSoftCom\Controllers\RockHopCustomPrints;
use RockHopSoft\Survloop\Controllers\Globals\Globals;

class RockHopSoftCom extends RockHopCustomPrints
{
    /*
    // Initializing a bunch of things which are not [yet] automatically determined by the software
    protected function initExtra(Request $request)
    {
        return true;
    }

    // Initializing a bunch of things which are not [yet] automatically determined by the software
    protected function loadExtra()
    {
        return true;
    }
    */

    protected function customNodePrint(&$curr = null)
    {
        $ret = '';
        $docuNavs = [  ];
        if (in_array($curr->nID, $docuNavs)) {
            $ret .= $this->printDocumentationNav($curr->nID);
        } elseif (in_array($curr->nID, [101])) {
            $ret .= view('vendor.rockhopsoftcom.nodes.46-donate')->render();
        } elseif (in_array($curr->nID, [237])) {
            $ret .= $this->printDalleDisclaim($curr->nID);

        } elseif ($curr->nID == 36) {
            $ret .= rock()->getRockBlade('36-instruct-create-super-user');
        } elseif ($curr->nID == 38) {
            $ret .= rock()->getRockBlade('38-instruct-install-jitsi');
        } elseif ($curr->nID == 89) {
            $ret .= rock()->getRockBlade('89-instruct-install-mattermost');


        } elseif ($curr->nID == 252) {
            $this->addHshoosClouds();
        } elseif ($curr->nID == 251) {
            $ret .= $this->osBlockWrapSolOffer(852); // NextCloud
        } elseif ($curr->nID == 70) {
            $ret .= $this->osBlockWrapSolOffer(797); // ONLYOFFICE
        } elseif ($curr->nID == 160) {
            $ret .= $this->osBlockWrapSolOffer(804); // Passbolt
        } elseif ($curr->nID == 77) {
            $ret .= $this->osBlockWrapSolOffer(799); // Jitsi
        } elseif ($curr->nID == 80) {
            $ret .= $this->osBlockWrapSolOffer(798); // Mattermost
        } elseif ($curr->nID == 71) {
            $ret .= $this->osBlockWrapSolOffer(800, 2); // WordPress
        } elseif ($curr->nID == 79) {
            $ret .= $this->osBlockWrapSolOffer(802, 2); // Email
        } elseif ($curr->nID == 72) {
            $ret .= rock()->getRockBlade('72-server-mgmt-services');
        } elseif (in_array($curr->nID, [91, 172])) {
            $ret .= rock()->getRockBlade('91-about-morgan-blurb');

        } elseif ($curr->nID == 225) {
            $ret .= $this->printRockHopCaptcha();
        } elseif ($curr->nID == 227) {
            $ret .= $this->printRockHopApptCalen();
        } elseif ($curr->nID == 105) {
            $this->chkQuoteTbls();
        } elseif ($curr->nID == 122) {
            $this->quoteSurvComplete();
        } elseif ($curr->nID == 159) {
            $ret .= $this->quoteAutoCloud();
        } elseif ($curr->nID == 186) {
            $ret .= $this->quoteAdmToolkit();

        } elseif ($curr->nID == 230) {
            $ret .= $this->printAutoQuoteHeader();

        } elseif ($curr->nID == 168) {
            $ret .= $this->quoteInquriesMgmt();
        } elseif ($curr->nID == 191) {
            $ret .= $this->printClientMgmt();
        } elseif ($curr->nID == 206) {
            if (slreq()->has('addLoopNID')
                && intVal(slreq()->get('addLoopNID')) > 0) {
                $this->newLoopItem(slreq()->get('addLoopNID'));
            }

        }
        return $ret;
    }

    protected function customResponses(&$curr)
    {
        if ($curr->nID == 37) {

        }
        return $curr;
    }

    protected function postNodePublicCustom(&$curr)
    {
        $tbl = 'quote_request';
        // list($curr->tbl, $curr->fld) = $this->allNodes[$curr->nID]->getTblFld();
        if ($curr->nID == 227 && isset($this->sessData->dataSets[$tbl])) {
            $val = ((slreq()->has('n227fld')) ? slreq()->get('n227fld') : null);
            $this->sessData->dataSets[$tbl][0]->qr_appointment = $val;
            $this->sessData->dataSets[$tbl][0]->save();
            return true;
        }
        return false; // false to continue standard post processing
    }

    public function ajaxChecksCustom(Request $request, $type = '')
    {
        if ($type == 'something-cool') {

        }
        return '';
    }

    // returns an array of overrides for ($currNodeSessionData, ???...
    protected function printNodeSessDataOverride(&$curr)
    {
        if (sizeof($this->sessData->dataSets) == 0) {
            return [];
        }
        if ($curr->nID == 37) {

        }
        return [];
    }

    protected function checkNodeConditionsCustom($nID, $condition = '')
    {
        if ($condition == '#PassedRockHopCaptcha') {
            return ($this->passedCaptcha() ? 1 : 0);
        }
        return -1;
    }

    protected function getTableRecLabelCustom($tbl, $rec = [], $ind = -3)
    {
        if (in_array($tbl, ['quote_big_tech', 'Big Tech Platforms'])
            && $rec
            && isset($rec->big_tech_def)) {
            return sldefs()->getVal('Big Tech Platforms', $rec->big_tech_def);
        }
        return '';
    }

}