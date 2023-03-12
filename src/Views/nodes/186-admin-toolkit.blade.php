<!-- generated from resources/views/vendor/rockhopsoftcom/nodes/
    186-admin-toolkit.blade.php -->
<div id="node186" class="w100">

<form action="?cid={{ sl()->coreID }}&admSave=1"
    name="mainPageForm" method="post">
<input type="hidden" id="csrfTok" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="cid" value="{{ sl()->coreID }}">
<input type="hidden" name="admSave" value="1">
<div class="row">
    <div class="col-md-6">
        <h1>Manage Inquiry</h1>
    </div>
    <div class="col-md-3 taR pT10">
        <b>Date Replied:</b>
    </div>
    <div class="col-md-3">
        {!! sl()->printDatePicker(
            $quoteWrap->getRepliedDateSlashes(),
            'dateReplied'
        ) !!}
    </div>
</div>

<label class="w100">
    Notes:<br />
    <textarea id="quoteNoteID" name="quoteNote" autocomplete="off"
        class="form-control font-control-lg" style="height: 200px;"
        >{!! $quoteWrap->getFld('notes') !!}</textarea>
<div class="w100 pT30 taC">
    <input type="submit" class="btn btn-secondary btn-lg" value="Save Changes">
</div>
</form>

</div>
<style>
#node186 {
  margin-top: -10px;
  padding: 20px 60px 20px 60px;
  margin-bottom: 15px;
}
#node186 {
    color: #FFF;
  border: 3px #006D36 solid;
  -moz-border-radius: 10px; border-radius: 10px;
 background: rgb(0,109,54);
background: linear-gradient(0deg, rgba(0,109,54,1) 0%, rgba(0,0,0,1) 15%, rgba(0,14,7,1) 33%, rgba(0,109,54,1) 100%);
}
</style>