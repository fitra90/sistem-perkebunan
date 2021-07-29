@extends('layout')
@section('title', 'Transaction Header')
<?php if (isset($data)) { ?>
    @section('title_section', 'Edit Transaction Header')
<?php } else { ?>
    @section('title_section', 'New Transaction Header')
<?php } ?>

@section('customCSS')
<link rel="stylesheet" href="/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />
@stop
@section('content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Form</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" action="<?= isset($data) ? '/save-edit-header/' . $data->notrans : '/save-new-header'; ?>" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">No Transaction</label>
                        <div class="col-md-6">
                            <input type="text" name="notrans" class="form-control" id="notrans" value="<?= isset($data) ? $data->notrans : ""; ?>" onKeyDown="javascript: var keycode = keyPressed(event); if(keycode==32){ return false; }" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Tanggal</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                <input type="text" data-plugin-datepicker="" class="form-control" name="tanggal" value="<?= isset($data) ? $data->tanggal : ""; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Divisi</label>
                        <div class="col-md-6">
                            <input type="number" min="0" max="9" name="divisi" class="form-control divisi" id="divisi" value="<?= isset($data) ? $data->divisi : ""; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Total</label>
                        <div class="col-md-6">
                            <input type="number" min="0" max="9" name="totalbuah" class="form-control totalbuah" id="totalbuah" value="<?= isset($data) ? $data->totalbuah : ""; ?>" required>
                        </div>
                    </div>
                    <br>
                    <center>
                        <button type="button" class="mb-xs mt-xs mr-xs btn btn-default" onclick="cancel()">Cancel</button>
                        <button type="submit" class="mb-xs mt-xs mr-xs btn btn-success">Save</button>
                    </center>
                </form>
            </div>
        </section>
    </div>
</div>

@section('customJS')
<script src="/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
    function cancel() {
        location.href = "/transaction-header"
    }

    function keyPressed() {
        var key = event.keyCode || event.charCode || event.which;
        return key;
    }
</script>
@stop
@stop