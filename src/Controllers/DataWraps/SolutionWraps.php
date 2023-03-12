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

class SolutionWraps
{
    public $quoteID     = 0;
    public $userCnt     = 1;
    public $sols        = [];
    public $feeTotOnce  = 0;
    public $feeTotMonth = 0;
    public $feeTotHost  = 0;
    public $cntServers  = 0;

    /**
     * Load wrapper for uploaded survey files with relevant info.
     *
     * @param  int  $quoteID
     * @return void
     */
    public function __construct($quoteID = -3, $userCnt = 0)
    {
        if ($userCnt > 0) {
            $this->userCnt = $userCnt;
        }
        if ($quoteID > 0) {
            $this->quoteID = $quoteID;
            $this->sols = [];
            /*
            if (isset($this->sessData->dataSets["quote_big_tech"])
                && sizeof($this->sessData->dataSets["quote_big_tech"]) > 0) {
                foreach ($this->sessData->dataSets["quote_big_tech"] as $big) {
                    if (isset($big->big_relation)
                        && intVal($big->big_relation) > 0) {
                        $this->bigs[] = new BigTechWrap($big);
                    }
                }
            }
            */
        }
        return $this->sols;
    }

    public function hasSolDef($solDef)
    {
        $found = false;
        if (sizeof($this->sols) > 0) {
            foreach ($this->sols as $solWrap) {
                if ($solDef == $solWrap->solDef) {
                    $found = true;
                }
            }
        }
        return $found;
    }

    public function addSolDef($solDef)
    {
        if (!$this->hasSolDef($solDef)) {
            $this->sols[] = new SolutionWrap(NULL, $solDef);
        }
    }

    public function getSol($solDef)
    {
        if (sizeof($this->sols) > 0) {
            foreach ($this->sols as $solWrap) {
                if ($solDef == $solWrap->solDef) {
                    return $solWrap;
                }
            }
        }
        return null;
    }

    public function hasEmail()
    {
        return $this->hasSolDef(802);
    }

    public function isOnlyEmail()
    {
        return (sizeof($this->sols) == 1 && $this->hasSolDef(802));
    }

    public function cntServers()
    {
        if ($this->cntServers == 0) {
            if (sizeof($this->sols) > 0) {
                foreach ($this->sols as $solWrap) {
                    if (!in_array($solWrap->solDef, [802])) {
                        $this->cntServers++;
                    }
                }
            }
        }
        return $this->cntServers;
    }

    public function solDefOfferDescOneTime($solDef)
    {
        return 'One-Time Setup Fee';
    }

    public function solDefOfferDescMonthly($solDef)
    {
        return 'Monthly Tech Support Fee';
    }

    public function totalOfferFeesOneTime()
    {
        $this->feeTotOnce = 0;
        if (sizeof($this->sols) > 0) {
            foreach ($this->sols as $sol) {
                $this->feeTotOnce += $sol->feeOnce;
            }
        }
        return $this->feeTotOnce;
    }

    public function totalOfferFeesMonthly()
    {
        $this->feeTotMonth = 0;
        if (sizeof($this->sols) > 0) {
            foreach ($this->sols as $sol) {
                $this->feeTotMonth += $sol->feeMonth;
            }
        }
        return $this->feeTotMonth;
    }

    public function totalHostingFeesMonthly()
    {
        $this->feeTotHost = 0;
        if (sizeof($this->sols) > 0) {
            foreach ($this->sols as $sol) {
                if ($sol->solDef == 802) {
                    //$this->feeTotHost += ($sol->feeHost*$this->userCnt);
                } else {
                    $this->feeTotHost += ($sol->feeHost*1);
                }
            }
        }
        return $this->feeTotHost;
    }

    public function totalEmailFees()
    {
        return ($this->getSol(802)->feeHost*$this->userCnt);
    }

    public function totalFeesMonthly()
    {
        if ($this->isOnlyEmail()) {
            return 0;
        }
        $tot = $this->totalOfferFeesMonthly()+$this->totalHostingFeesMonthly();
        if ($this->hasEmail()) {
            $tot += $this->totalEmailFees();
        }

        return $tot;
    }


}