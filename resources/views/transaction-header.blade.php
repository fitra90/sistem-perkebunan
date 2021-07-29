@extends('layout')
@section('title', 'Transaction Header Detail')
@section('title_section', 'Header Detail')
@section('content')


<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <button class="btn btn-info" type="button" onclick="newTrx()">New Header</button>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-none">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No. Transaction</th>
                                <th>Tanggal</th>
                                <th>Divisi</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data as $header)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$header->notrans}}</td>
                                <td>{{$header->tanggal}}</td>
                                <td>{{$header->divisi}}</td>
                                <td>{{$header->totalbuah}}</td>
                                <td>
                                    <input type="hidden" class="id" value="<?= $header->notrans; ?>">
                                    <button class="btn btn-default" type="button" onclick='editTrx()'>Edit</button>
                                    <button class="btn btn-danger" type="button" onclick='deleteTrx()'>Delete</button>
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
    function deleteTrx() {
        var id = $('.id').val() ;
        var r = confirm("Are you sure want to delete this header?");
        if (r == true) {
            // txt = "You pressed OK!";
            yesDelete(id)
        }
    }

    function editTrx() {
        var id = $('.id').val() ;
        location.href = "/edit-header/" + id
    }

    function newTrx() {
        location.href = "/new-header/"
    }

    function yesDelete(id) {
        $.ajax({
            url: '/delete-header/' + id,
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