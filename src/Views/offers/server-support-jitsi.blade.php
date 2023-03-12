<!-- generated from resources/views/vendor/rockhopsoftcom/offers/
    server-support-jitsi.blade.php -->
<div class="container">

<div class="row">
    <div class="col-lg-6">
        <div class="pB15">
            <a href="https://jitsi.org/" target="_blank"
                ><img src="/rockhopsoftcom/jitsi-logo.png" border="0"
                style="width: 100%; max-width: 500px;"
                alt="Jitsi Meet logo" title="Jitsi Meet logo"></a>
        </div>
        <h4><a href="https://jitsi.org/" target="_blank">jitsi.org</a></h4>
        <p>Over <a href="https://www.similarweb.com/website/meet.jit.si/#traffic"
            target="_blank">6,000,000</a> visits per month</p>
    </div>
    <div class="col-lg-6">
        <iframe width="100%" height="315"
            src="https://www.youtube.com/embed/TB7LlM4erx8"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen
            ></iframe>
    </div>
</div>

<div class="osDesc">
<div class="row">
<div class="col-md-7 pT15">
<h4 class="bld">Collaboration Solutions For:</h4>
<table class="table table-striped">
<tr>
<td>Click for Documentation</td>
<td>YouTube</td>
</tr>
<tr>
<td><a href="https://jitsi.github.io/handbook/docs/user-guide/" target="_blank">Video Chat Meetings</a></td>
<td><a href="https://www.youtube.com/results?search_query=how+to+use+Jitsi" target="_blank" class="mL15"><i class="fa-brands fa-youtube"></i></a></td>
</tr>
</table>

<p>
Jitsi provides secure, more flexible video conferencing with end-to-end encryption.
They have a completely free service that anyone can use at
<a href="https://meet.jit.si/" target="_blank">meet.jit.si</a>.
But for added privacy and control, you can run it from your own server space.
</p>

</div>
<div class="col-md-1"></div>
<div class="col-md-4 pT15">

<div class="slCard round30">
<h4 class="bld">An Alternative To:</h4>
<ul>
<li>Google Teams <span class="slGrey">(Google Workspace starts at <nobr><a href="https://workspace.google.com/pricing.html" target="_blank">$6.00</a> per user</nobr> <nobr>per month)</nobr></span></li>
<li>Zoom <span class="slGrey">(business version starts at <nobr><a href="https://zoom.us/pricing#personal" target="_blank">$12.49</a> per user</nobr> <nobr>per month)</nobr></span>
</li>
</ul>
</div>

</div>
</div>

</div>

<div class="pT30">
    <div class="row">
        <div class="col-md-5 pT15 pB15">
            <div class="osCostWrap">
                <table border="0" class="w100">
                <tr class="brdBotWht">
                <td class="taL">One-Time Setup Fee</td>
                <td class="taR">${{
                    number_format($sols->getSol(799)->feeOnce, 2)
                }}</td>
                </tr>
                <tr>
                <td class="taL">Monthly Tech Support Fee</td>
                <td class="taR">${{
                    number_format($sols->getSol(799)->feeMonth, 2)
                }}</td>
                </tr>
                <tr>
                <td class="taL">Monthly Hosting Costs</td>
                <td class="taR">${{
                    number_format($sols->getSol(799)->feeHost, 2)
                }}</td>
                </tr>
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6 pT15 pB15">
            <h5><i>More Jitsi Resources:</i></h5>
            <div class="osLinks">
            <a href="https://meet.jit.si/" target="_blank"
                >meet.jit.si</a><br />
            <a href="https://jitsi.org/user-faq/" target="_blank"
                >jitsi.org/user-faq/</a><br />
            <a href="https://en.wikipedia.org/wiki/Jitsi" target="_blank"
                >wikipedia.org/wiki/Jitsi</a><br />
            </div>
        </div>
    </div>
</div>


</div>