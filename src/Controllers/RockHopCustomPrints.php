<?php
/**
  * RockHopSoftCom extends the Survloop main branching-tree engine.
  *
  * RockHopSoft.com
  * @package  rockhopsoft/rockhopsoftcom
  * @author  Morgan Lesko <rockhoppers@runbox.com>
  * @since 0.0
  */
namespace RockHopSoft\RockHopSoftCom\Controllers;

use App\Models\RHQuoteBigTech;
use RockHopSoft\RockHopSoftCom\Controllers\RockHopClients;
use RockHopSoft\RockHopSoftCom\Controllers\DataWraps\RockHopCalendar;
use RockHopSoft\RockHopSoftCom\Controllers\DataWraps\RockHopCaptcha;

class RockHopCustomPrints extends RockHopClients
{

    protected function addHshoosClouds()
    {
        sl()->addHshoo('#nextcloud');
        sl()->addHshoo('#onlyoffice');
        sl()->addHshoo('#passbolt');
        sl()->addHshoo('#mattermost');
        sl()->addHshoo('#jitsi');
        sl()->addHshoo('#wordpress');
        sl()->addHshoo('#email');
        sl()->addHshoo('#hosting');
        sl()->addHshoo('#domains');
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

    protected function passedCaptcha()
    {
        $tbl = 'quote_request';
        return (isset($this->sessData->dataSets[$tbl][0]->qr_captcha_challenge)
            && isset($this->sessData->dataSets[$tbl][0]->qr_captcha_answer)
            && trim($this->sessData->dataSets[$tbl][0]->qr_captcha_answer) != ''
            && $this->sessData->dataSets[$tbl][0]->qr_captcha_challenge
                == $this->sessData->dataSets[$tbl][0]->qr_captcha_answer);
    }

    protected function failedCaptcha()
    {
        $tbl = 'quote_request';
        return (isset($this->sessData->dataSets[$tbl][0]->qr_captcha_challenge)
            && isset($this->sessData->dataSets[$tbl][0]->qr_captcha_answer)
            && trim($this->sessData->dataSets[$tbl][0]->qr_captcha_challenge)
                != ''
            && trim($this->sessData->dataSets[$tbl][0]->qr_captcha_answer) != ''
            && $this->sessData->dataSets[$tbl][0]->qr_captcha_challenge
                != $this->sessData->dataSets[$tbl][0]->qr_captcha_answer);
    }

    protected function printRockHopCaptcha()
    {
        $tbl = 'quote_request';
        if (!isset($this->sessData->dataSets[$tbl])) {
            return '';
        }
        if ($this->passedCaptcha()) {
            return '<h3 class="slGreenDark">Thanks, You Have Already Passed '
                . 'Our Unique <nobr>Human Challenge!</nbor></h3>';
        }
        $captcha = new RockHopCaptcha;
        $challenge = $captcha->getChallenge();
        $this->sessData->dataSets["quote_request"][0]->qr_captcha_challenge
            = $challenge["correct"];
        $this->sessData->dataSets["quote_request"][0]->save();
        return $challenge["printed"];
    }

    protected function printRockHopApptCalen()
    {
        if ($this->failedCaptcha()) {
            return '<h3 class="slRedDark">Sorry, You Failed Passed '
                . 'Our Unique <nobr>Human Challenge.</nbor> '
                . 'Go back to <nobr>try again.</nobr></h3>'
                . '<h3 class="slRedDark">So you can\'t immediately '
                . 'schedule an appointment <nobr>right now.</nobr></h3>';
        }
        $calen = new RockHopCalendar;
        $calen->getOpenings();
        return view(
            'vendor.rockhopsoftcom.nodes.227-schedule-calen',
            [ "calen" => $calen ]
        )->render();
    }

    protected function printAutoQuoteHeader()
    {
//echo 'printAutoQuoteHeader()<pre>'; print_r($this->sessData->dataSets); echo '</pre>';
        if (!isset($this->sessData->dataSets["quote_request"])
            || !isset($this->sessData->dataSets["quote_request"][0]->qr_id)) {
            return '<!-- --> printAutoQuoteHeader';
        }
        return view(
            'vendor.rockhopsoftcom.nodes.230-auto-quote-header',
            [ "quote" => $this->sessData->dataSets["quote_request"][0] ]
        )->render();
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