<div class="apptBtnWrap">
    <a class="apptBtn btn btn-secondary btn-sm" href="javascript:;"
        data-time="{{ $appt->saveStartTime() }}"
        data-time-print="{{ $appt->printTimeCurrent() }}"
        data-date="{{ date('y-m-d', $appt->startTime) }}"
        >{{ $appt->printTime() }}</a>
</div>