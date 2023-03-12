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

use App\Models\RHQuoteBigTech;
use RockHopSoft\RockHopSoftCom\Controllers\RockHopClients;

class RockHopCustomPrints extends RockHopClients
{

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

    protected function osBlockWrapSolOffer($solDef, $type = '')
    {
        return '<div class="osBlockWrap' . $type . '">'
            . rock()->solDefPrintOffer($solDef) . '</div>';
    }

    protected function osBlockWrap($blade, $type = '')
    {
        $blade = 'vendor.rockhopsoftcom.nodes.' . $blade;
        return '<div class="osBlockWrap' . $type . '">'
            . view($blade)->render() . '</div>';
    }

}