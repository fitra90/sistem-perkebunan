@extends('layout')
@section('title', 'Admin Dashboard')
<?php if (isset($data)) { ?>
    @section('title_section', 'Edit User')
<?php } else { ?>
    @section('title_section', 'New User')
<?php } ?>
@section('content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Form</h2>
            </header>
            <div class="panel-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="form-horizontal form-bordered" action="<?= isset($data) ? '/save-edit-user/' . $data->id : '/save-new-user'; ?>" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Username</label>
                        <div class="col-md-6">
                            <input type="text" name="username" class="form-control" id="username" value="{{ isset($data) ? $data->username : old('username')}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault">Password</label>
                        <div class="col-md-6">
                            <input type="password" name="password" class="form-control" id="password" value="{{ isset($data) ? $data->password : old('password')}}" required>
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
        location.href = "/users"
    }
</script>
@stop