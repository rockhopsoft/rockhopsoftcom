<!-- resources/views/vendor/rockhopsoftcom/nodes/
    230-auto-quote-header.blade.php -->

<center>
<div class="taC pT60 pB60">
    <h2>
        Thank you for contacting <nobr>Rockhopper Software!</nobr>
    </h2>
    <p><span class="txtInfo">Inquiry #{{ $quote->qr_id }}</span></p>
@if (isset($quote->qr_appointment) && trim($quote->qr_appointment) != '')
    <div class="row">
        <div class="col-md-6 taC pT15">
            <h5>
                We look forward to meeting with you<br /><nobr>for 30-60 minutes on</nobr>
            </h5>
            <h2><span class="txtInfo">{!! $printTime !!}</span></h2>
            @if ($apptTimeZone != sl()->sysDefaultTimeZoneID())
                <p>
                    ({{ date("g:ia", strtotime($quote->qr_appointment)) }}
                    EST for Rockhopper)
                </p>
            @endif
        </div>
        <div class="col-md-6 taC pT15">
            <p class="pB0 mB0" style="min-height: 53px;">
                Unless otherwise discussed, we will plan to video chat with you
                via computer <nobr>or smart phone</nobr> <nobr>via this link:</nobr>
            </p>
            <h2>
                <a href="https://jitsig.com/rockhop{{ $quote->qr_id }}"
                    target="_blank" class="txtInfo"
                    >jitsig.com/rockhop{{ $quote->qr_id }}</a>
            </h2>
        </div>
    </div>
@else
    <h5>
        We will follow up with you as soon <nobr>as possible.</nobr>
    </h5>
@endif

</div>
</center>