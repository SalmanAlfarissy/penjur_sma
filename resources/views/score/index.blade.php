@extends('layouts.main')

@section('title','Penjur SMA')
@section('page_title','Score')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Score</li>
@endsection

@section('content')
<div class="row">
    <div class="btn-group col-md-2">
        <button type="button" class="btn btn-primary">+ Score</button>
        <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
        <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu" role="menu">
            <button class="dropdown-item" data-toggle="modal" data-target="#modalSemester1Create">Semester 1</button>
            <button class="dropdown-item" data-toggle="modal" data-target="#modalSemester2Create">Semester 2</button>
            <button class="dropdown-item" data-toggle="modal" data-target="#modalSemester3Create">Semester 3</button>
            <button class="dropdown-item" data-toggle="modal" data-target="#modalSemester4Create">Semester 4</button>
            <button class="dropdown-item" data-toggle="modal" data-target="#modalSemester5Create">Semester 5</button>
        </div>
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
                            <th>MTK</th>
                            <th>BING</th>
                            <th>BIND</th>
                            <th>IPA</th>
                            <th>IPS</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@include('score.semester1')
@include('score.semester2')
@include('score.semester3')
@include('score.semester4')
@include('score.semester5')


@endsection

@push('custom-script')
{{-- <script>

    $(document).ready(function () {
        readData();
    });


    function readData(){
        $.ajax({
            type: "GET",
            url: "{{ route('getdata-student') }}",
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
                        {"data": "nisn"},
                        {"data": "jekel"},
                        {"data": "date"},
                        {"data": "id"},
                    ],
                    "columnDefs":[
                        {
                            "targets" : 5,
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
            url: "{{ route('create-student') }}",
            data: form,
            success: function (result) {
                $("#modalCreate").modal('hide');
                swal(result.message, "You clicked the button!", "success");
                $('#form-create').trigger('reset')
                readData();
            },
            error : function(xhr, error){
                console.log(xhr);
                console.log(error);
            }
        });
    })

    $(document).on('click', '.btn-edit', function(){
        $.ajax({
            type: "GET",
            url: "{{ route('getdata-student') }}",
            data: {
                id: $(this).data('id'),
            },
            success: function (result) {
                if (result.data) {
                    var form = $('#form-edit');
                    var data = result.data;

                    form.find('input[name=id]').val(data.id);
                    form.find('input[name=name]').val(data.name);
                    form.find('input[name=nisn]').val(data.nisn);
                    form.find('select[name=jekel]').val(data.jekel);
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
            url: "{{ route('update-student','') }}/"+form.find("input[name=id]").val(),
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
                    url : "{{ route('delete-student','') }}/"+$(this).data('id'),
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

</script> --}}

@endpush
