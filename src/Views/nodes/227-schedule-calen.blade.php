<!-- resources/views/vendor/rockhopsoftcom/nodes/
    227-schedule-calen.blade.php -->

<input type="hidden" name="n227fld" id="n227FldID" autocomplete="off"
    class="slNodeChange ntrStp" value="">
<input type="hidden" name="printTime" id="printTimeID" autocomplete="off"
    value="">

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

.treeWrapForm {
    padding: 0px;
    min-width: 100%;
    max-width: 100%;
}
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
    padding-left: 2px;
    padding-right: 2px;
    min-width: 55px;
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


function printCurrApptTime() {
    if (document.getElementById("n227FldID") && document.getElementById("printTimeID") && document.getElementById("apptCurrTime") && document.getElementById("apptCalenWrap") && document.getElementById("printTimeID").value != "") {
        document.getElementById("apptCurrTime").innerHTML='<div class="pT30"><div class="col-8"><h2 class="slGreenDark">Scheduled for '+document.getElementById("printTimeID").value+'</h2><a id="apptCurrTimeClear" class="btn btn-secondary" href="javascript:;"><i class="fa fa-times mR5" aria-hidden="true"></i> Select a Different Time</a></div>';
        document.getElementById("apptCalenWrap").style.display="none";
        $("#apptCurrTime").fadeIn(200);
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
    }
});

}); </script>