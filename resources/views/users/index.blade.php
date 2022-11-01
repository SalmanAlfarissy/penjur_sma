@extends('layouts.main')

@section('title','Penjur SMA')
@section('page_title','Users')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Users</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-2">
        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modalCreate">
           + Create
        </button>
    </div>
    <div class="col-md-10">
    </div>

    <div class="col-md-12">
        <div class="card-header">
            <h3 class="card-title">List Data</h3>
        </div>
        <div class="card">

            <div class="card-body table-responsive">
                <table class="table table-bordered text-nowrap" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Nip</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create-->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="form-create" method="POST">
            @csrf
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Data</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                </div>

                <div class="form-group">
                    <label>Nip</label>
                    <input type="text" class="form-control" placeholder="Nip" name="nip" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Data</button>
            </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="form-edit" method="POST">
            @csrf
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" required>
                    <input type="hidden" name="id">
                </div>

                <div class="form-group">
                    <label>Nip</label>
                    <input type="text" class="form-control" placeholder="Nip" name="nip" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Data</button>
            </div>
        </form>
      </div>
    </div>
</div>


@endsection

@push('custom-script')
<script>

    $(document).ready(function () {
        readData();

    });


    function readData(){
        $.ajax({
            type: "GET",
            url: "{{ route('getdata-user') }}",
            data: {},
        }).done(function(result){
                $('#dataTable').DataTable({
                    "paging":true,
                    "ordering":true,
                    "responsive":true,
                    "destroy":true,
                    "data":result.data,
                    "columns":[
                        {"data": "no"},
                        {"data": "name"},
                        {"data": "nip"},
                        {"data": "date"},
                        {"data": "id"},
                    ],
                    "columnDefs":[
                        {
                            "targets" : 4,
                            "data" : "id",
                            "render":function(data, type, row){
                                return '<div class="btn-group">'+
                                '<button type="button" class="btn btn-primary">Action</button>'+
                                '<button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">'+
                                '<span class="sr-only">Toggle Dropdown</span>'+
                                '</button>'+
                                '<div class="dropdown-menu" role="menu">'+
                                '<button class="dropdown-item btn-edit" data-id="'+data+'">Edit</button>'+
                                '<button class="dropdown-item btn-delete" data-id="'+data+'">Delete</button>'+
                                '</div>'+
                            '</div>';
                            }
                        }
                    ],
                });
        }).fail(function(xhr, error){
            console.log(xhr);
            console.log(error);
        });
    }

    $(document).on('submit','#form-create', function(e){
        e.preventDefault();

        var form = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "{{ route('create-user') }}",
            data: form,
            success: function (result) {
                $("#modalCreate").modal('hide');
                swal(result.message, "You clicked the button!", "success");
                readData();
                $('#form-create').trigger('reset')

            },
            error : function(xhr, error){
                console.log(xhr);
                console.log(error);
                console.log(row);
            }
        });
    })

    $(document).on('click', '.btn-edit', function(){
        $.ajax({
            type: "GET",
            url: "{{ route('getdata-user') }}",
            data: {
                id: $(this).data('id'),
            },
            success: function (result) {
                if (result.data) {
                    var form = $('#form-edit');
                    var data = result.data;

                    form.find('input[name=id]').val(data.id);
                    form.find('input[name=name]').val(data.name);
                    form.find('input[name=nip]').val(data.nip);
                    form.find('input[name=password]').val(data.password);
                    $('#modalEdit').modal('show');

                }else{
                    alert('Data not found!!');
                }
            },
            error: function(xhr, error){
                console.log(xhr);
                console.log(error);
            }
        });
    });

    $(document).on('submit', '#form-edit', function(e){
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: "POST",
            url: "{{ route('update-user','') }}/"+form.find("input[name=id]").val(),
            data: form.serialize(),
            success: function (result) {
                if(result.status){
                    $("#modalEdit").modal('hide');
                    swal(result.message, "You clicked the button!", "success");
                    readData();
                }else{
                    alert('Data not found!');
                }
            },
            error: function(xhr, error){
                console.log(xhr);
                console.log(error);
            }
        });

    })


    $(document).on('click', '.btn-delete', function(e){
        e.preventDefault();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var inputToken = $('input[name=_token]');
                $.ajax({
                    url : "{{ route('delete-user','') }}/"+$(this).data('id'),
                    type : 'POST',
                    data : {
                        _token: inputToken.val(),
                    }
                }).done(function(result){
                    inputToken.val(result.newToken);
                    if(result.status){
                        readData();
                        swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                        });
                    }else{
                        alert("Data Not Found!!");
                    }

                }).fail(function(xhr, error){
                    console.log(xhr);
                    console.log(error);
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    })

</script>

@endpush
