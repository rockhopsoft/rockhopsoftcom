<!-- resources/views/vendor/rockhopsoftcom/nodes/
    227-schedule-calen.blade.php -->

<input type="hidden" name="n227fld" id="n227FldID"
    class="slNodeChange ntrStp" autocomplete="off"
    @if (isset($quote->qr_appointment)) value="{{ $quote->qr_appointment }}"
    @else value=""
    @endif >
<input type="hidden" name="printTime" id="printTimeID" autocomplete="off"
    @if ($printTime && intVal($printTime) > 0)
        value="{{ date("n/j g:ia", $printTime) }}"
    @else value=""
    @endif >

<div class="container-fluid">
    <div id="apptCurrTime" class="disNon"></div>

    <div id="apptCalenWrap" class="disBlo">
        <div id="calenWrapMobile">
            {!! $calen->printDayMobileRock() !!}
        </div>
        <div id="calenWrapDesktop"><div class="pT15">
            {!! $calen->printMonthDesktopRock() !!}
        </div></div>
        <div id="calenWrapNavMobile">
            {!! $calen->printDayNavMobileRock() !!}
        </div>
    </div>
</div>

<style>

#pageBtns {
    text-align: center;
}
#nodeSubBtns {

}
#apptCurrTime {
    padding: 0px 30px;
}
#node261 {
    padding: 5px;
    margin-top: 0px;
}
#apptTimeZoneID {
    max-width: 420px;
    margin: -5px 0px 15px 0px;
}
.apptBtnWrap {
    float: left;
    text-align: center;
    padding: 5px 0px;
    width: 50%;
}
a.apptBtn:link, a.apptBtn:active, a.apptBtn:visited, a.apptBtn:hover {
    padding-left: 4px;
    padding-right: 4px;
    min-width: 64px;
}

@media screen and (min-width: 576px)  {
    .treeWrapForm {
        padding: 0px 15px;
    }
    #node261 {
        padding: 15px;
    }
    .apptBtnWrap {
    }
}

</style>

<script type="text/javascript"> $(document).ready(function(){

function changeApptTimeZone(apptTime) {
    if (document.getElementById("ajaxWrap")) {
        let title = "Rockhopper Hopping Time Zones";
        let urlAjax = "?zone="+apptTime+"{!! ((slreq()->has('day')) ? '&day=' . slreq()->get('day') : '') !!}";
        $( "#ajaxWrap" ).load(urlAjax+"&ajax=1");
        userNavPrinting = false;
        //loadJsMenu(url);
        pushBrowserPage1(title, urlAjax);
        if (document.getElementById("mySidenav")) {
            closeRightNav();
        }
    }
}
$(document).on("change", "#apptTimeZoneID", function() {
    return changeApptTimeZone($(this).val());
});
$(document).on("change", "#apptTimeZoneMobileID", function() {
    return changeApptTimeZone($(this).val());
});


function wideSurveyScreen() {
    if (document.getElementById("skinnySurv")) {
        //document.getElementById("skinnySurv").style.padding="0px";
        document.getElementById("skinnySurv").style.minWidth="100%";
        document.getElementById("skinnySurv").style.maxWidth="100%";
    }
}
function thinSurveyScreen() {
    if (document.getElementById("skinnySurv")) {
        //document.getElementById("skinnySurv").style.padding="0 15px";
        document.getElementById("skinnySurv").style.minWidth="240px";
        document.getElementById("skinnySurv").style.maxWidth="730px";
    }
}


function printCurrApptTime() {
    if (document.getElementById("n227FldID") && document.getElementById("printTimeID") && document.getElementById("apptCurrTime") && document.getElementById("apptCalenWrap") && document.getElementById("n228FldID")) {
        if (document.getElementById("printTimeID").value != "") {
            let zoneID = document.getElementById("n228FldID").value;
            document.getElementById("apptCurrTime").innerHTML='<div class="pT30"><div class="col-8"><h2 class="slGreenDark">Scheduling for '+document.getElementById("printTimeID").value+' '+getTimeZoneAbbrFromId(zoneID)+'</h2><a id="apptCurrTimeClear" class="btn btn-secondary mT30" href="javascript:;"><i class="fa fa-times mR5" aria-hidden="true"></i> Select a Different Time</a></div>';
            document.getElementById("apptCalenWrap").style.display="none";
            $("#apptCurrTime").fadeIn(200);
            thinSurveyScreen();
        } else {
            wideSurveyScreen();
        }
    }
}
setTimeout( function() { printCurrApptTime(); }, 1 );

$(document).on("click", ".apptBtn", function() {
    if (document.getElementById("n227FldID")) {
        document.getElementById("n227FldID").value=$(this).attr("data-time");
    }
    if (document.getElementById("printTimeID")) {
        document.getElementById("printTimeID").value=$(this).attr("data-time-print");
    }
    printCurrApptTime();
});

$(document).on("click", "#apptCurrTimeClear", function() {
    if (document.getElementById("n227FldID") && document.getElementById("printTimeID") && document.getElementById("apptCurrTime") && document.getElementById("apptCalenWrap")) {
        document.getElementById("n227FldID").value="";
        document.getElementById("printTimeID").value="";
        document.getElementById("apptCurrTime").style.display="none";
        $("#apptCalenWrap").fadeIn(200);
        wideSurveyScreen();
    }
});

}); </script>