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

class RockHopCalenAppt
{
    public $startTime = null;
    public $printTime = null;

    /**
     * Start time is in the system's default time zone.
     * Print time is in the user's requested time zone.  
     *
     * @param  int  $roomID
     * @return int
     */
    public function __construct($startTime, $printTime = 0)
    {
        $this->startTime = $startTime;
        $this->printTime = $printTime;
        if ($printTime <= 0) {
            $this->printTime = $this->startTime;
        }
    }

    public function saveStartTime()
    {
        return date("Y-m-d H:i:s", $this->startTime);
    }

    public function printDateTime()
    {
        return date("Y-m-d H:i:s", $this->printTime);
    }

    public function printTime()
    {
        return date("g:i a", $this->printTime);
    }

    public function printTimeCurrent()
    {
        return date("n/j g:i a", $this->printTime);
    }

    public function printLogBlock($timespan = 'day')
    {
        return view(
            'vendor.rockhopsoftcom.nodes.227-schedule-calen-appt',
            [
                "appt"     => $this,
                "timespan" => $timespan
            ]
        )->render();
    }

}