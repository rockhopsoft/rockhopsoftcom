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
use App\Models\RHQuoteRequest;
use App\Models\RHQuoteSolution;
use RockHopSoft\RockHopSoftCom\Controllers\DataWraps\BigTechWraps;
use RockHopSoft\RockHopSoftCom\Controllers\DataWraps\InstantQuoteWrap;
use RockHopSoft\RockHopSoftCom\Controllers\DataWraps\SolutionWraps;
use RockHopSoft\Survloop\Controllers\Tree\TreeSurvForm;

class RockHopQuotes extends TreeSurvForm
{
    protected function chkQuoteTbls()
    {
        if (isset($this->sessData->dataSets["quote_request"])) {
            if (!isset($this->sessData->dataSets["quote_big_tech"])
                || sizeof($this->sessData->dataSets["quote_big_tech"]) == 0) {
                $defs = sldefs()->getSet('Big Tech Platforms');
                if (sizeof($defs) > 0) {
                    foreach ($defs as $def) {
                        $chk = RHQuoteBigTech::where('big_quote_id', $this->coreID)
                            ->where('big_tech_def', $def->def_id)
                            ->first();
                        if (!$chk || !isset($chk->big_id)) {
                            $new = new RHQuoteBigTech;
                            $new->big_quote_id = $this->coreID;
                            $new->big_tech_def = $def->def_id;
                            $new->save();
                            $this->sessData->dataSets["quote_big_tech"][] = $new;
                        }
                    }
                    $this->loadSessionData('quote_request', $this->coreID);
                    foreach ($this->sessData->dataSets["quote_big_tech"] as $b) {
                        $this->sessData->loopItemIDs["Big Tech Platforms"][]
                            = $b->big_id;
                    }
                }
            }
        }
    }

    protected function quoteSurvComplete()
    {
        if (isset($this->sessData->dataSets["quote_request"])) {
            $this->sessData->dataSets["quote_request"][0]->qr_submitted
                = sl()->getServerDateNow();
            $this->sessData->dataSets["quote_request"][0]->save();
        }
    }

    protected function getQuoteBigs()
    {
        $this->v["bigs"] = [];
        if (isset($this->sessData->dataSets["quote_big_tech"])) {
            $this->v["bigs"]
                = new BigTechWraps($this->sessData->dataSets["quote_big_tech"]);
        }
        return $this->v["bigs"];
    }

    protected function getQuoteSolutions()
    {
        $this->v["sols"] = [];
        if (isset($this->sessData->dataSets["quote_solution"])) {
            $this->v["sols"]
                = new SolutionWraps($this->sessData->dataSets["quote_solution"]);
        }
        return $this->v["sols"];
    }

    protected function quoteUserCnt()
    {
        $tbl = 'quote_request';
        if (isset($this->sessData->dataSets[$tbl])
            && isset($this->sessData->dataSets[$tbl][0]->qr_user_cnt)) {
            return intVal($this->sessData->dataSets[$tbl][0]->qr_user_cnt);
        }
        return 1;
    }

    private function storeQuoteSol($solDef)
    {
        $chk = RHQuoteSolution::where('sol_quote_id', $this->coreID)
            ->where('sol_def_id', $solDef)
            ->first();
        if (!$chk || !isset($chk->sol_id)) {
            $sol = new RHQuoteSolution;
            $sol->sol_quote_id = $this->coreID;
            $sol->sol_def_id = $solDef;
            $sol->save();
        }
    }

    protected function quoteSurvCalc()
    {
        $this->v["sols"] = new SolutionWraps(-3, $this->quoteUserCnt());
        RHQuoteSolution::where('sol_quote_id', $this->coreID)
            ->delete();
        $this->getQuoteBigs();
        if (sizeof($this->v["bigs"]->bigs) == 0) {
            $this->v["sols"]->addSolDef(797);
            $this->storeQuoteSol(797);
        } else {
            foreach ($this->v["bigs"]->bigs as $big) {
                $sols = $big->getSolDefs();
                if (sizeof($sols) > 0) {
                    foreach ($sols as $sol) {
                        $this->v["sols"]->addSolDef($sol);
                        $this->storeQuoteSol($sol);
                    }
                }
            }
        }
    }

    protected function quoteAutoCloud()
    {
        $this->quoteSurvCalc();
        return view(
            'vendor.rockhopsoftcom.nodes.159-auto-quote-cloud',
            $this->v
        )->render();
    }

    protected function quoteAdmToolkit()
    {
        if (!isset($this->sessData->dataSets["quote_request"])) {
//echo '????<pre>'; print_r(slreq()->all()); echo '</pre>'; exit;
            return '<span></span>';
        }
        $this->v["quoteWrap"] = new
            InstantQuoteWrap($this->sessData->dataSets["quote_request"][0]);
        if (slreq()->has('admSave') && intVal(slreq()->get('admSave')) == 1) {
            $this->quoteAdmToolkitSave();
        }
//echo 'quoteAdmToolkit<pre>'; print_r(slreq()->all()); echo '</pre>'; exit;
        return view(
            'vendor.rockhopsoftcom.nodes.186-admin-toolkit',
            $this->v
        )->render();
    }

    protected function quoteAdmToolkitSave()
    {
        if (!$this->isStaffOrAdmin()) {
            return false;
        }
        if ((slreq()->has('dateReplied')
                && trim(slreq()->get('dateReplied')) != '')
            || (slreq()->has('quoteNote')
                && trim(slreq()->get('quoteNote')) != '')) {
            $this->v["quoteWrap"]->rec->qr_date_replied
                = sl()->slashDateToDate(slreq()->get('dateReplied'));
            $this->v["quoteWrap"]->rec->qr_notes
                = trim(slreq()->get('quoteNote'));
            $this->v["quoteWrap"]->rec->save();
//echo '<pre>'; print_r($this->v["quoteWrap"]->rec); echo '</pre>'; exit;
        }
    }

    protected function loadInquries()
    {
        if (!isset($this->v["quotes"])) {
            $this->v["quotes"] = [];
        }
        if (sizeof($this->v["quotes"]) == 0) {
            $chk = RHQuoteRequest::whereNotNull('qr_submitted')
                ->get();
            if ($chk && sizeof($chk) > 0) {
                foreach ($chk as $quote) {
                    $this->v["quotes"][] = new InstantQuoteWrap($quote);
                }
            }
        }
        return $this->v["quotes"];
    }

    protected function quoteInquriesMgmt()
    {
        $this->loadInquries();
        return view(
            'vendor.rockhopsoftcom.nodes.168-quote-inquiries',
            $this->v
        )->render();
    }

}