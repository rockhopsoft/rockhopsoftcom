<!-- resources/views/vendor/rockhopsoftcom/nodes/
    225-rockhop-captcha.blade.php -->

<input type="hidden" name="n225fld" id="n225FldID" data-nid="225"
    class="form-control form-control-lg slTab slNodeChange ntrStp"
    value="">

<div id="captchaInstructWrap">
    <h5 class="p0">Below, click one of the penguin images which has...</h5>
</div>
<div class="p5">
    <div id="captchaInstruct" class="row">
        <div class="col-sm-4 col-6 taC pT15 pB15">
            <div class="round5 brdRhs3 pT10">
                <h5 id="captchaInstructPhoto1" class="slBlueDark">
                    <nobr>This many</nobr> penguins
                </h5>
                <img src="{{ $count }}" border="0" class="w100 brdTopBlue">
            </div>
        </div>
        <div class="col-sm-4 col-6 taC pT15 pB15">
            <div class="round5 brdRhs3 pT10">
                <h5 id="captchaInstructPhoto2" class="slBlueDark">
                    Penguins looking
                    <nobr>this direction</nobr>
                </h5>
                <img src="{{ $leftRight }}" border="0" class="w100 brdTopBlue">
            </div>
        </div>
        <div class="col-sm-4 taC pT15 pB15">
            <div class="round5 brdRhs3 pT10">
                <h5 class="slBlueDark">
                    Eyebrows <nobr>that are</nobr> <nobr>the color of</nobr>
                </h5>
                <h2 class="pB10">{!! $colorDesc !!}</h2>
            </div>
        </div>
    </div>
</div>

<div class="w100 bgFnt round15 pT5 pB5">
    <div class="row">
    @foreach ($imgIDs as $imgID)
        <div class="col-sm-4 col-6 pT10 pB10 taC">
            <a id="captchaImg{{ $imgID }}" class="captchaImg"
                href="javascript:;"
                ><img src="{{ $imgPath . $imgID }}.jpg"
                    border="0" class="w100 brd"></a>
        </div>
    @endforeach
    </div>
</div>

<div class="row mT5">
    <div class="col-md-4 col-6">
        <a href="?refresh=1" class="btn btn-secondary"
            ><i class="fa fa-refresh mR5" aria-hidden="true"></i>
            Refresh <nobr>Human Quiz</nobr></a>
    </div>
    <div class="col-md-8 col-6 pT10">
        Click this refresh button is this variation
        of the challenge is causing too much grief.
    </div>
</div>

<style>
.treeWrapForm {
    padding: 0px;
}
#node253 {
    padding: 0px;
}
#node258HalfGapB {
    display: none;
}
#nLabel258 {
    padding: 30px 0px 0px 30px;
}
#captchaInstructWrap {
    padding: 15px 30px 0px 30px;
}
#captchaInstruct h5 {
    padding-left: 10px;
    padding-right: 10px;
}
#captchaInstructPhoto1 {
    padding-top: 10px;
}
#captchaInstructPhoto1, #captchaInstructPhoto2 {
    min-height: 75px;
}
a.captchaImg:link, a.captchaImg:active,
a.captchaImg:visited, a.captchaImg:hover,
a.captchaImgSelected:link, a.captchaImgSelected:active,
a.captchaImgSelected:visited, a.captchaImgSelected:hover {
    display: block;
    width: 100%;
    border: 15px #EDF8FF solid;
}
a.captchaImgSelected:link, a.captchaImgSelected:active,
a.captchaImgSelected:visited, a.captchaImgSelected:hover {
    border: 15px #401CF8 solid;
}
a.captchaImg:hover {
    border: 15px #4DC5FF solid;
}

@media (min-width: 576px)  {
    .treeWrapForm {
        padding: 0px 15px;
    }
    #captchaInstructPhoto1 {
        padding-top: 0px;
    }
    #captchaInstruct h5, #captchaInstructPhoto1, #captchaInstructPhoto2 {
        min-height: 75px;
    }
}
@media (min-width: 700px)  {
    #captchaInstruct h5, #captchaInstructPhoto1, #captchaInstructPhoto2 {
        min-height: 55px;
    }
}

</style>

<script type="text/javascript"> $(document).ready(function() {

function captchaImgClick(imgId) {
@foreach ($imgIDs as $imgID)
    if (document.getElementById("captchaImg{{ $imgID }}")) {
        document.getElementById("captchaImg{{ $imgID }}").className = "captchaImg";
    }
@endforeach
    if (document.getElementById("n225FldID") && document.getElementById("captchaImg"+imgId+"")) {
        document.getElementById("n225FldID").value = imgId;
        document.getElementById("captchaImg"+imgId+"").className = "captchaImgSelected";
    }
}
$(document).on("click", ".captchaImg", function() {
    let imgId = $(this).attr("id").replace("captchaImg", "");
    captchaImgClick(imgId);
});

}); </script>