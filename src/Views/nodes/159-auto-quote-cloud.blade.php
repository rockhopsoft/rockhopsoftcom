<!-- generated from resources/views/vendor/rockhopsoftcom/nodes/
    159-auto-quote-cloud.blade.php -->

<h2 class="slBlueDark">Instant Quote for Your Private Cloud</h2>
<p class="rockTxtSize">
Based on your responses alone, we would
likely recommend the solutions described below.
</p>
<p class="rockTxtSize">
But we will still need to talk more before
providing accurate recommendations and final quotes.
</p>

@if (sizeof($sols->sols) == 1 && $sols->sols[0]->solDef == 802)

    <div class="row mT30">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="w100 bgFnt p15">
                <table border="0" class="table w100">
                <tr>
                    <td>Standalone Email Setup & Migration Fee</td>
                    <td class="taR">$60.00</td>
                </tr>
                <tr>
                    <td class="brdTop3 bld">One-Time Total</td>
                    <td class="brdTop3 bld taR">$60.00</td>
                </tr>
                </table>
            </div>
        </div>
    </div>
    {!! view(
        'vendor.rockhopsoftcom.offers.inc-server-support-email'
    )->render() !!}

@else

    <div class="row mT30">
        <div class="col-lg-5">
            <div class="w100 bgFnt p15 mB30">
                <h3 class="fR pR5">${{
                    ceil($sols->totalOfferFeesOneTime())
                }}</h3>
                <h3 class="fL pB15">One-Time Setup Costs</h3>
                <div class="fC"></div>
                <table border="0" class="table w100">
        @foreach ($sols->sols as $sol)
            @if ($sol->solDef != 802)
                <tr>
                    <td>{!! $sol->printName() !!} Setup Fee</td>
                    <td class="taR">${{
                        number_format($sol->feeOnce, 2)
                    }}</td>
                </tr>
            @endif
        @endforeach
            @if ($sols->hasEmail())
                <tr>
                    <td class="brdTopGreen">Free Email Setup & Migration</td>
                    <td class="brdTopGreen slGreenDark taR">$0.00</td>
                </tr>
            @endif
                <tr>
                    <td class="brdTopBlue3 bld">Setup Total</td>
                    <td class="brdTopBlue3 bld taR">${{
                        number_format($sols->totalOfferFeesOneTime(), 2)
                    }}</td>
                </tr>
                </table>
            </div>
            {!! view(
                'vendor.rockhopsoftcom.offers.inc-server-support-install'
            )->render() !!}
            {!! view(
                'vendor.rockhopsoftcom.offers.inc-server-disclaim-install'
            )->render() !!}
        @if ($sols->hasEmail())
            {!! view(
                'vendor.rockhopsoftcom.offers.inc-server-support-email'
            )->render() !!}
        @endif
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-5">
            <div class="w100 bgFnt p15 mB30">
                <h3 class="fR pR5">${{
                    ceil($sols->totalFeesMonthly())
                }}</h3>
                <h3 class="fL pB15">Monthly Costs</h3>
                <div class="fC"></div>
                <table border="0" class="table w100">
        @foreach ($sols->sols as $sol)
            @if ($sol->solDef != 802)
                <tr>
                    <td>{!! $sol->printName() !!} Support Fee</td>
                    <td class="taR">${{
                        number_format($sol->feeMonth, 2)
                    }}</td>
                </tr>
            @endif
        @endforeach
                <tr>
                    <td class="brdTopBlue3 bld">Support Total</td>
                    <td class="brdTopBlue3 bld taR">${{
                        number_format($sols->totalOfferFeesMonthly(), 2)
                    }}</td>
                </tr>
                </table>

                <table border="0" class="table w100 mT50">
        @foreach ($sols->sols as $sol)
            @if ($sol->solDef != 802)
                <tr>
                    <td>{!! $sol->printName() !!} Hosting Fee</td>
                    <td class="taR">${{
                        number_format($sol->feeHost, 2)
                    }}</td>
                </tr>
            @endif
        @endforeach
                <tr>
                    <td class="slGrey">
                        Includes full weekly backups for
                        restoration <nobr>in an emergency</nobr>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td class="brdTopBlue3 bld">Hosting Total</td>
                    <td class="brdTopBlue3 bld taR">${{
                        number_format($sols->totalHostingFeesMonthly(), 2)
                    }}</td>
                </tr>
                </table>

        @if ($sols->hasEmail())
                <table border="0" class="table w100 mT50">
                <tr>
                    <td>Email Fee Estimate</td>
                    <td class="taR">${{
                        number_format($sols->getSol(802)->feeHost, 2)
                    }} / user</td>
                </tr>
                <tr>
                    <td class="brdTopBlue3 bld">
                        Total Email Fees (for {{ $sols->userCnt }} Users)
                    </td>
                    <td class="brdTopBlue3 bld taR">${{
                        number_format($sols->totalEmailFees(), 2)
                    }}</td>
                </tr>
                </table>
        @endif
            </div>
            {!! view(
                'vendor.rockhopsoftcom.offers.inc-server-support-services'
            )->render() !!}
            {!! view(
                'vendor.rockhopsoftcom.offers.inc-server-disclaim-services',
                [ "sols" => $sols ]
            )->render() !!}
        </div>
    </div>

    <div class="pT30">
    {!! view(
        'vendor.rockhopsoftcom.offers.inc-server-disclaim-billing'
    )->render() !!}
    </div>

@endif