@extends('layout')
@section('title', 'Admin Dashboard')
<?php if (isset($data)) { ?>
    @section('title_section', 'Edit Transaction Detail')
<?php } else { ?>
    @section('title_section', 'New Transaction Detail')
<?php } ?>
@section('content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Form</h2>
            </header>
            <div class="panel-body">
                <form class="form-horizontal form-bordered" action="<?= isset($data) ? '/save-edit-transaction/' . $data->id : '/save-new-transaction'; ?>" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">No. Transaction</label>
                        <div class="col-md-6">
                            <select id="status" name="notrans" class="form-control mb-md notrans">
                                <option value="0">&nbsp;</option>
                                @foreach($data_header as $header)
                                <option value="{{$header->notrans}}" <?= isset($header) && $header->notrans == $header->notrans ? "selected" : ""; ?>>{{$header->notrans}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Kondisi Buah</label>
                        <div class="col-md-6">
                            <select id="buah" name="buah" class="form-control mb-md buah">
                                <option value="0">&nbsp;</option>
                                @foreach($data_buah as $buah)
                                <option value="{{$buah->id}}" <?= isset($data) && $buah->id == $data->idbuah ? "selected" : ""; ?>>{{$buah->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Jumlah</label>
                        <div class="col-md-6">
                            <input type="number" name="jumlah" class="form-control jumlah" id="jumlah" value="<?= isset($data) ? $data->jumlah : ""; ?>" required>
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

<script>
    function cancel() {
        location.href = "/"
    }
</script>
@stop