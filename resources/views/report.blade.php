@extends('layout')
@section('title', 'Report')
@section('title_section', 'Report')
@section('content')

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <h1>Report by Date</h1>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-none">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Panen</th>
                                <th>Matang</th>
                                <th>Lewat Matang</th>
                                <th>Busuk</th>
                                <th>Tangkai Panjang</th>
                                <th>Buah Keras</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data_by_date as $date)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$date->username}}</td>
                               
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <h1>Report by Divisi</h1>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-none">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data_by_divisi as $divisi)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$user->username}}</td>
                                <td>
                                    <button class="btn btn-default" type="button" onclick='editUser(<?= $user->id; ?>)'>Edit</button>
                                    <button class="btn btn-danger" type="button" onclick='deleteUser(<?= $user->id; ?>)'>Delete</button>
                                </td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@stop