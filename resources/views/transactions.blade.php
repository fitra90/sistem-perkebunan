@extends('layout')
@section('title', 'Admin Dashboard')
@section('title_section', 'Transaction Detail')
@section('content')


<div class="row">
    <div class="col-md-12">
        <section class="panel">
            @if(Session::get('role') == 1)
            <header class="panel-heading">
                <button class="btn btn-info" type="button" onclick="newTrx()">New Transaction</button>
            </header>
            @endif
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-none">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. Transaction</th>
                                <th>Buah</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data as $transaction)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$transaction->notrans}}</td>
                                <td>{{$transaction->idbuah}}</td>
                                <td>{{$transaction->jumlah}}</td>
                                <td>
                                    <button class="btn btn-default" type="button" onclick='editTrx(<?= $transaction->id; ?>)'>Edit</button>
                                    <button class="btn btn-danger" type="button" onclick='deleteTrx(<?= $transaction->id; ?>)'>Delete</button>
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
<script>
    function deleteTrx(id) {
        var r = confirm("Are you sure want to delete this transaction?");
        if (r == true) {
            // txt = "You pressed OK!";
            yesDelete(id)
        }
    }

    function editTrx(id) {
        location.href = "/edit-transaction/" + id
    }

    function newTrx() {
        location.href = "/new-transaction/"
    }

    function yesDelete(id) {
        $.ajax({
            url: '/delete-transaction/' + id,
            type: 'DELETE',
            data: {
                'id': id,
                '_token': '{{ csrf_token() }}',
            }
        }).done(function(response) {
            if (response) {
                location.reload()
            } else {
                alert("Failed to delete data");
            }
        })
    }
</script>
@stop