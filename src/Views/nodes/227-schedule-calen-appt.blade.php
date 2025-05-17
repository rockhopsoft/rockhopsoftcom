<div class="apptBtnWrap">
    <a class="apptBtn btn btn-secondary btn-sm"
        data-time="{{ $appt->saveStartTime() }}"
        data-time-print="{{ $appt->printTimeCurrent() }}"
        data-date="{{ date('y-m-d', $appt->startTime) }}" href="javascript:;"
        >{{ $appt->printTime() }}</a>
</div>