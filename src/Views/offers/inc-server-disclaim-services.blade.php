<!-- generated from resources/views/vendor/rockhopsoftcom/offers/
    inc-server-disclaim-services.blade.php -->
<p class="pT30 rockTxtSize">
    For each piece of software, your monthly tech support fee
    includes up to two hours of help and coaching by Rockhopper.
    This does not include any time spent on fixing any technical
    problems which may occur with your server or software.
</p>
<p class="rockTxtSize">
@if ($sols && isset($sols->sols))
    With {{ $sols->cntServers() }} software installations,
    your monthly support fees would include up to
    {{ ($sols->cntServers()*2) }} hours of user help and coaching.
@else
    For each software installation, your monthly support fees would
    include up to 2 hours of user help and coaching.
@endif
    If you need, this might also include consulting and support
    for other web services that your organization depends upon.
</p>
<p class="rockTxtSize slGrey">
    If needed, subsequent hours may be negotiated around $30/hr.
</p>