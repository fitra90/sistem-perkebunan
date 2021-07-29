@extends('layout')
@section('title', 'Users')
@section('title_section', 'List of Fruit Criteria')
@section('content')

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <button class="btn btn-info" type="button" onclick="newCriteria()">New Criteria</button>
            </header>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-none">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($data as $criteria)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$criteria->name}}</td>
                                <td>
                                    <button class="btn btn-default" type="button" onclick='editCriteria(<?= $criteria->id; ?>)'>Edit</button>
                                    <button class="btn btn-danger" type="button" onclick='deleteCriteria(<?= $criteria->id; ?>)'>Delete</button>
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
    function deleteCriteria(id) {
        var r = confirm("Are you sure want to delete this criteria?");
        if (r == true) {
            yesDelete(id)
        }
    }

    function editCriteria(id) {
        location.href = "/edit-fruit-criteria/" + id
    }

    function newCriteria() {
        location.href = "/new-fruit-criteria/"
    }

    function yesDelete(id) {
        $.ajax({
            url: '/delete-fruit-criteria/' + id,
            type: 'DELETE',
            data: {
                'id': id,
                '_token': '{{ csrf_token() }}',
            }
        }).done(function(response) {
            if(response) {
                location.reload()
            } else {
                alert("Failed to delete data");
            }
        })
    }
</script>

@stop