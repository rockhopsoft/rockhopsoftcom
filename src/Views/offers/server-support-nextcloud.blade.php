<!-- generated from resources/views/vendor/rockhopsoftcom/offers/
    server-support-nextcloud.blade.php -->
<div class="nodeAnchor"><a name="nextcloud" id="nextcloud"></a></div>
<div class="row">
    <div class="col-lg-4 pT30 pB30">
        <div class="pB15">
            <a href="https://nextcloud.com/" target="_blank"
                ><img src="/rockhopsoftcom/platform-logo-Nextcloud.svg" 
                    border="0" class="w100" 
                    alt="Nextcloud logo" title="Nextcloud logo"></a>
            <h4 class="bld">NextCloud</h4>
            <h4><a href="https://nextcloud.com/" target="_blank"
                >nextcloud.com</a></h4>
            <p>
                Over <a href="https://nextcloud.com/" target="_blank"
                    >400,000</a> deployments, and
                <a href="https://nextcloud.com/hub/" target="_blank"
                    >tens of millions of users at thousands of organizations
                    <nobr>across the globe</a>.</nobr>
            </p>
        </div>
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-7 pT30 pB30">
        <iframe width="100%" height="315" class="brdRhs3"
            src="https://www.youtube.com/embed/OkGd_pNuYww"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen
            ></iframe>
    </div>
</div>

<div class="osDesc">
<div class="row">
    <div class="col-lg-7 pT15">
        <h4 class="bld">Collaboration Solutions For:</h4>
        <table class="table table-striped">
        <tr>
        <td>Click for Documentation</td>
        <td class="taC">YouTube</td>
        </tr>
        <tr>
        <td><a href="https://nextcloud.com/files/" target="_blank">Shared Files</a></td>
        <td class="taC"><a href="https://www.youtube.com/results?search_query=Nextcloud+files" target="_blank"><i class="fa-brands fa-youtube"></i></a></td>
        </tr>
        <tr>
        <td><a href="https://nextcloud.com/talk/" target="_blank">Talk: Online Meetings</a></td>
        <td class="taC"><a href="https://www.youtube.com/results?search_query=Nextcloud+talk" target="_blank"><i class="fa-brands fa-youtube"></i></a></td>
        </tr>
        <tr>
        <td><a href="https://nextcloud.com/groupware/" target="_blank">Groupware: Calendar, Contacts, Mail</a></td>
        <td class="taC"><a href="https://www.youtube.com/results?search_query=Nextcloud+Groupware" target="_blank"><i class="fa-brands fa-youtube"></i></a></td>
        </tr>
        <tr>
        <td><a href="https://nextcloud.com/office/" target="_blank">Office: Collaborative Editing</a></td>
        <td class="taC"><a href="https://www.youtube.com/results?search_query=Nextcloud+Office" target="_blank"><i class="fa-brands fa-youtube"></i></a></td>
        </tr>
        <tr>
        <td><a href="https://nextcloud.com/assistant/" target="_blank">AI Assistant</a></td>
        <td class="taC"><a href="https://www.youtube.com/results?search_query=Nextcloud+Assistant" target="_blank"><i class="fa-brands fa-youtube"></i></a></td>
        </tr>
        <tr>
        <td><a href="https://nextcloud.com/flow/" target="_blank">Workflow Automation</a></td>
        <td class="taC"><a href="https://www.youtube.com/results?search_query=Nextcloud+Flow" target="_blank"><i class="fa-brands fa-youtube"></i></a></td>
        </tr>
        <tr>
        <td><a href="https://apps.nextcloud.com/?is_featured=true" target="_blank">Countless Apps</a></td>
        <td class="taC"><a href="https://www.youtube.com/results?search_query=Nextcloud+best+apps" target="_blank"><i class="fa-brands fa-youtube"></i></a></td>
        </tr>
        </table>

<!---
        <h4 class="pT30 slBlueDark"><b>
        By running this open source software on your own server,
        you do not need to pay for each of your users!
        </b></h4>
        <p>
        Instead of paying by the user, the server costs
        are based on your organization's overall usage.
        Depending on your organization's usage of the server, we may
        need to boost your CPUs, RAM, and/or hard drive size. We will have
        <a href="https://www.digitalocean.com/pricing/droplets" target="_blank"
            >reasonably incremental options</a>
        to grow the server with your organization.
        </p>
--->

    </div>
    <div class="col-lg-5 pT15">

        <div class="slCard round30">
        <h4 class="bld">An Alternative To:</h4>
        <ul>
        <li>Google Drive, Docs, Spreadsheets, Slides
            <span class="slGrey"><nobr>(Google Workspace</nobr> starts at
            <nobr><a href="https://workspace.google.com/pricing.html" target="_blank"
                >$7.00</a> per user</nobr> <nobr>per month)</nobr></span></li>
        <!--- <li>Gmail / Google Suite</li> --->
        <li>Dropbox <span class="slGrey">(starting at
            <nobr><a href="https://www.dropbox.com/plans" target="_blank"
                >$15.00</a> per user</nobr> <nobr>per month)</nobr></span></li>
        <li>Slack <span class="slGrey">(starting at
            <nobr><a href="https://slack.com/pricing" target="_blank"
                >$8.75</a> per user</nobr> <nobr>per month)</nobr></span></li>
        <li>Asana <span class="slGrey">(more than 15 users starts at
            <nobr><a href="https://asana.com/pricing" target="_blank"
                >$13.49</a> per user</nobr> <nobr>per month)</nobr></span></li>
        </ul>
        <p>
        Combined, these alternatives <nobr>start at</nobr>
        <nobr>$44.24 <u>per user</u></nobr> <nobr>per month.</nobr>
        </p>
        <p>
        Nextcloud with just 9 users costs more than an Nextcloud server
        with Rockhopper <nobr>tech support.</nobr>
        </p>
        </div>

    </div>
</div>
</div>

<div class="pT30">
    <div class="row">
        <div class="col-lg-5 pT15 pB15">
            <div class="osCostWrap">
                <table border="0" class="w100">
                <tr class="brdBotWht">
                <td class="taL">One-Time Setup Fee</td>
                <td class="taR">${{
                    number_format($sols->getSol(852)->feeOnce, 2)
                }}</td>
                </tr>
                <tr>
                <td class="taL">Monthly Tech Support Fee</td>
                <td class="taR">${{
                    number_format($sols->getSol(852)->feeMonth, 2)
                }}</td>
                </tr>
                <tr>
                <td class="taL">Monthly Hosting Costs</td>
                <td class="taR">${{
                    number_format($sols->getSol(852)->feeHost, 2)
                }}</td>
                </tr>
                </table>
            </div>
            <div class="pT15 pL15 bld">Hosting Breakdown:</div>
            <ul class="rockTxtSize">
            <li>$24.00/month for server with minimum specs</li>
            <li>$4.80/month for automated weekly backups</li>
            </ul>
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-5 pT15 pB15">

<h4><i>More Nextcloud Resources:</i></h4>
<div class="osLinks">
<a href="https://docs.nextcloud.com/server/latest/user_manual/en/"
    target="_blank"
    >docs.nextcloud.com...user_manual</a><br />
<a href="https://docs.nextcloud.com/server/latest/admin_manual/"
    target="_blank"
    >docs.nextcloud.com...admin_manual</a><br />
<a href="https://en.wikipedia.org/wiki/Nextcloud" target="_blank"
    >wikipedia.org/wiki/Nextcloud</a><br />
<a href="https://youtube.com/nextcloud" target="_blank"
    >youtube.com/nextcloud</a><br />
<a href="https://www.youtube.com/results?search_query=how+to+use+Nextcloud"
    target="_blank"
    >youtube..?..how+to+use...</a><br />
<a href="https://nextcloud.com/blog/" target="_blank"
    >nextcloud.com/blog</a><br />
<a href="https://help.nextcloud.com/" target="_blank"
    >help.nextcloud.com</a><br />
</div>

        </div>
    </div>
</div>