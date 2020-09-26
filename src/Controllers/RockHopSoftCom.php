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
use RockHopSoft\Survloop\Controllers\Globals\Globals;
use RockHopSoft\Survloop\Controllers\Tree\TreeSurvForm;

class RockHopSoftCom extends TreeSurvForm
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
        $nID = $curr->nID;
        $docuNavs = [641, 2386, 441, 759, 999, 1081, 1793, 2281, 2681, 3088, 3099];
        if ($nID == 77) {
            $ret .= $this->gatherInstallStatTbl1($nID);
        } elseif ($nID == 81) {
            $ret .= $this->gatherInstallStatTbl2($nID);
        } elseif (in_array($nID, $docuNavs)) {
            $ret .= $this->printDocumentationNav($nID);
        }
        return $ret;
    }
    
    protected function customResponses($nID, &$curr)
    {
        if ($nID == 37) {
            
        }
        return $curr;
    }
    
    protected function postNodePublicCustom(&$curr)
    { 
        if (empty($tmpSubTier)) {
            $tmpSubTier = $this->loadNodeSubTier($curr->nID);
        }
        list($curr->tbl, $curr->fld) = $this->allNodes[$curr->nID]->getTblFld();
        if ($curr->nID == 37) {
            
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
        if ($condition == '#SomethingCool') {
            
        }
        return -1;
    }
    
    protected function printDocumentationNav($nID)
    {
        $docuNav = [
            [
                'How To Install Survloop', 
                [
                    [
                        '/how-to-install-survloop', 
                        'Install Survloop'
                    ],[
                        '/how-to-install-laravel-on-an-ubuntu-server', 
                        'Install Laravel on Ubuntu Server'
                    ],[
                        '/how-to-install-laravel-locally-on-a-mac', 
                        'Install Laravel locally <nobr>on a Mac</nobr>'
                    ]
                ]
            ],
            [
                'Survloop Codebase Orientation',
                [
                    [
                        '/introduction-to-survloop-codebase', 
                        'What Is Survloop?'
                    ],[
                        '/package-files-folders-classes', 
                        'Folders, Files, & Classes'
                    ],[
                        '/developer-work-flows', 
                        'Developer Work Flows'
                    ],[
                        '/how-a-basic-page-loads-with-survloop', 
                        'How A Basic Page Loads'
                    ]
                ]
            ]
        ];
        return view(
            'vendor.rockhopsoftcom.inc-documentation-navigation', 
            [
                "docuNav"  => $docuNav,
                "currPage" => $this->getCurrPage()
            ]
        )->render();
    }
    
}