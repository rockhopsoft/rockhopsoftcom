<?php
/**
  * RockHopCalendar
  *
  * RockHopSoft.com
  * @package  rockhopsoft/rockhopsoftcom
  * @author  Morgan Lesko <rockhoppers@runbox.com>
  * @since 0.0
  */
namespace RockHopSoft\RockHopSoftCom\Controllers\DataWraps;

use RockHopSoft\RockHopSoftCom\Controllers\DataWraps\RockHopCalenAppt;
use RockHopSoft\Survloop\Controllers\Utils\SurvCalendar;

class RockHopCalendar extends SurvCalendar
{
    public $appts = [];
    public $opens = [];

    public $officeHours = [
        1 => [ '10:00:00', '17:30:00' ], // Monday
        2 => [ '10:00:00', '17:30:00' ], // Tuesday
        3 => [ '10:00:00', '17:30:00' ], // Wednesday
        4 => [ '10:00:00', '17:30:00' ], // Thursday
        5 => [ '10:00:00', '17:30:00' ], // Friday
        6 => [ ], // Saturday
        7 => [ ]  // Sunday
    ];

    public function loadFilts()
    {
        $this->hasWeekends = false;
        $this->loadRockFirstDay();
    }

    public function loadRockFirstDay()
    {
        $this->startDay = $this->limitDay = $this->addToCurrDay($this->today, 1);
//echo 'getRockFirstDay() A today: ' . date("y-m-d", $this->today) . ', limitDay: ' . date("y-m-d", $this->limitDay) . ', startDay: ' . date("y-m-d", $this->startDay) . '<br />';
        while (in_array(date("D", $this->startDay), ['Sat', 'Sun'])) {
            $this->startDay = $this->incrementCurrDay($this->startDay);
        }
        if (!slreq()->has('day')) {
            $this->currDay = $this->startDay;
        }
//echo 'getRockFirstDay() B today: ' . date("y-m-d", $this->today) . ', limitDay: ' . date("y-m-d", $this->limitDay) . ', startDay: ' . date("y-m-d", $this->startDay) . ', currDay: ' . date("y-m-d", $this->currDay) . '<br />';
    }

    protected function printCurrDayLogsStart()
    {
        return '';
    }

    protected function printCurrDayLogsEnd()
    {
        return '<div class="fC"></div>';
    }

    public function getOpenings()
    {
        $this->loadAppts(1);
        $offset = $this->getCurrTimeZoneOffset();
        $currApptDay = $this->addToCurrDay($this->getToday(), 1);
        $cutoff = mktime(0, 0, 0, date("m", $currApptDay),
            intVal(date("d", $currApptDay))+45, date("Y", $currApptDay));
        while ($currApptDay <= $cutoff) {
            $dayOfWk = date('N', $currApptDay);
            if (sizeof($this->officeHours[$dayOfWk]) == 2) {
                $this->days[$currApptDay] = [];
                $str = date('Y-m-d', $currApptDay) . ' ';
                $startTime = strtotime($str . $this->officeHours[$dayOfWk][0]);
                $endTime   = strtotime($str . $this->officeHours[$dayOfWk][1]);
                $currAppt = $startTime;
//echo 'getOpenings() currAppt: ' . date("Y-m-d H:i", $currAppt) . ' - getZoneHourAdjust(' . $this->currTimeZone . ') offset = ' . $offset . '<br />';
                while ($currAppt <= $endTime) {
                    if ($this->checkOpening($currAppt)) {
                        $printAppt = $this->addToCurrHours($currAppt, $offset);
                        $this->days[$currApptDay][]
                            = new RockHopCalenAppt($currAppt, $printAppt);
                    }
                    $currAppt = $this->incrementOpeningTime($currAppt);
                }
//echo 'getOpenings() ' . date("Y-m-d", $this->currDay) . ', dayOfWk: ' . $dayOfWk . '<br />';
            }
            $currApptDay = $this->addToCurrDay($currApptDay, 1);
        }
//echo '<pre>'; print_r($this->days); echo '</pre>'; exit;
    }

    public function incrementOpeningTime($curr)
    {
        return mktime(date("H", $curr), intVal(date("i", $curr))+30, 0,
            date("m", $curr), date("d", $curr), date("Y", $curr));
    }

    public function checkOpening($curr)
    {
        if (sizeof($this->appts) > 0) {
            foreach ($this->appts as $appt) {
                if (sizeof($appt) == 2) {
                    if ($curr >= strtotime($appt[0])
                        && $curr <= strtotime($appt[1])) {
                        return false;
                    }
                }
            }
        }
        return true;
    }

    public function printDayMobileRock($startDay = -1)
    {
//echo 'printDayMobileRock() A today: ' . date("y-m-d", $this->today) . '<br />';
        // $this->today = $this->getRockFirstDay();
//echo 'printDayMobileRock() B startDay: ' . date("y-m-d", $this->startDay) . '<br />';
        return $this->printDayMobile();
    }

    public function printMonthDesktopRock()
    {
        return $this->printMonthDesktop();
    }

    public function printDayNavMobileRock()
    {
//echo '<h3>printDayNavMobileRock() A</h3> today: ' . date("y-m-d", $this->today) . ', startDay: ' . date("y-m-d", $this->startDay) . '<br />';
        $start = $this->addToCurrDay($this->startDay, -7);
//echo '<h3>printDayNavMobileRock() B</h3> startDay: ' . date("y-m-d", $this->startDay) . '<br />';
        return $this->printDayNavMobile($start);
    }

}