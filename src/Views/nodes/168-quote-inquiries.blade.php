<!-- generated from resources/views/vendor/rockhopsoftcom/nodes/
    168-quote-inquiries.blade.php -->
<div class="container-fluid pT15 pB15">

    <div class="fR">
        <a href="/start/inquiry" target="_blank"
            class="btn btn-secondary">Inquiry Form</a>
    </div>
    <h2>Inquiries & Instant Cloud Quotes</h2>
    <div class="fC"></div>
@if (sizeof($quotes) > 0)
    <table class="table table-striped w100">
        <tr>
        <th>ID#</th>
        <th>Date Submitted</th>
        <th>Date Replied</th>
        <th>Contact Name</th>
        <th>Email</th>
        <th>Big Techs Used</th>
        <th>Open Solutions</th>
        </tr>
    @foreach ($quotes as $q => $quote)
        <tr>
        <td><a href="/auto-quote?cid={{ $quote->id }}" target="_blank"
            class="btn @if ($quote->getRepliedDateSlashes() == '') btn-danger
                @else btn-secondary @endif w100"
            >#{{ $quote->id }}</a></td>
        <td class="pT15">{{ date("n/j/y", $quote->timeSub) }}</td>
        <td class="pT15">{{ $quote->getRepliedDateSlashes() }}</td>
        <td class="pT15">{{ $quote->rec->qr_name }}</td>
        <td class="pT15">{{ $quote->rec->qr_email }}</td>
        <td class="pT15">{{ sizeof($quote->getBigsUsed()) }}</td>
        <td class="pT15">{{ sizeof($quote->sols) }}</td>
        </tr>
    @endforeach
    </table>
@else
    <i>No inquiries have been completed.</i>
@endif

</div>