<!-- generated from resources/views/vendor/rockhopsoftcom/nodes/
    191-client-mgmt.blade.php -->
<div class="container-fluid pT15 pB15">

    <div class="fR">
        <a href="/dashboard/start/client-editor"
            target="_blank" class="btn btn-secondary"
            ><i class="fa fa-plus-circle mR3"></i> New Client</a>
    </div>
    <h2>Rockhopper Clients</h2>
    <div class="fC"></div>
@if (sizeof($clients) > 0)
    <table class="table table-striped w100">
        <tr>
        <th>Client Name</th>
        <th>Solutions</th>
        </tr>
    @foreach ($clients as $c => $client)
        <tr>
        <td><a href="/auto-quote?cid={{ $client->id }}"
            class="btn btn-primary w100" target="_blank"
            >{{ $client->name }}</a></td>
        <td class="pT15">{{ sizeof($client->sols) }}</td>
        <td><a href="/auto-quote?cid={{ $client->id }}"
            class="btn btn-secondary w100" target="_blank"
            ><i class="fa fa-pencil"></i></a></td>
        </tr>
    @endforeach
    </table>
@else
    <i>No clients have been added.</i>
@endif

</div>