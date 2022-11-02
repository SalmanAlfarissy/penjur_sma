@extends('layouts.main')

@section('title','Penjur SMA')
@section('page_title','Students')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Students</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-2">
        {{-- <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modalCreate">
           + Create
        </button> --}}
        <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalCreate">
            <i class="fa fa-plus"></i> Tambah Data
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
                            <th>Nisn</th>
                            <th>MTK</th>
                            <th>BING</th>
                            <th>BIND</th>
                            <th>IPA</th>
                            <th>IPS</th>
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
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Data</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="col-md-6" id="createStudent">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>Nisn</label>
                            <input type="text" class="form-control" placeholder="Nisn" name="nisn" required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jekel">
                              <option selected value="L">Laki-Laki</option>
                              <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </form>
                    <div class="col-md-6 ml-auto"></div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th style="width: 10px">No</th>
                          <th>Semester</th>
                          <th>MTK</th>
                          <th>BING</th>
                          <th>BIND</th>
                          <th>IPA</th>
                          <th>IPS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <form id="createSemester1">
                                @csrf
                                <input type="hidden" name="student_id" class="student_id">
                                <td>1</td>
                                <td>Semester 1</td>
                                <td>
                                    <input type="number" class="form-control" placeholder="MTK" name="mtk" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="BING" name="bing" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="BIND" name="bind" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="IPA" name="ipa" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="IPS" name="ips" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form id="createSemester2">
                                @csrf
                                <input type="hidden" name="student_id" class="student_id">
                                <td>2</td>
                                <td>Semester 2</td>
                                <td>
                                    <input type="number" class="form-control" placeholder="MTK" name="mtk" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="BING" name="bing" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="BIND" name="bind" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="IPA" name="ipa" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="IPS" name="ips" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form id="createSemester3">
                                @csrf
                                <input type="hidden" name="student_id" class="student_id">
                                <td>3</td>
                                <td>Semester 3</td>
                                <td>
                                    <input type="number" class="form-control" placeholder="MTK" name="mtk" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="BING" name="bing" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="BIND" name="bind" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="IPA" name="ipa" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="IPS" name="ips" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form id="createSemester4">
                                @csrf
                                <input type="hidden" name="student_id" class="student_id">
                                <td>4</td>
                                <td>Semester 4</td>
                                <td>
                                    <input type="number" class="form-control" placeholder="MTK" name="mtk" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="BING" name="bing" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="BIND" name="bind" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="IPA" name="ipa" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="IPS" name="ips" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form id="createSemester5">
                                @csrf
                                <input type="hidden" name="student_id" class="student_id">
                                <td>5</td>
                                <td>Semester 5</td>
                                <td>
                                    <input type="number" class="form-control" placeholder="MTK" name="mtk" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="BING" name="bing" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="BIND" name="bind" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="IPA" name="ipa" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control" placeholder="IPS" name="ips" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                            </form>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-create">Save Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="col-md-6" id="editStudent">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" required>
                            <input type="hidden" name="id">
                        </div>

                        <div class="form-group">
                            <label>Nisn</label>
                            <input type="text" class="form-control" placeholder="Nisn" name="nisn" required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jekel">
                              <option selected value="L">Laki-Laki</option>
                              <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </form>
                    <div class="col-md-6 ml-auto"></div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th style="width: 10px">No</th>
                          <th>Semester</th>
                          <th>MTK</th>
                          <th>BING</th>
                          <th>BIND</th>
                          <th>IPA</th>
                          <th>IPS</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <form id="editSemester1">
                                @csrf
                                <input type="hidden" class="semester1-id" name="id">
                                <td>1</td>
                                <td>Semester 1</td>
                                <td>
                                    <input type="number" class="form-control semester1-mtk" placeholder="MTK" name="mtk" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester1-bing" placeholder="BING" name="bing" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester1-bind" placeholder="BIND" name="bind" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester1-ipa" placeholder="IPA" name="ipa" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester1-ips" placeholder="IPS" name="ips" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form id="editSemester2">
                                @csrf
                                <input type="hidden" class="semester2-id" name="id">
                                <td>2</td>
                                <td>Semester 2</td>
                                <td>
                                    <input type="number" class="form-control semester2-mtk" placeholder="MTK" name="mtk" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester2-bing" placeholder="BING" name="bing" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester2-bind" placeholder="BIND" name="bind" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester2-ipa" placeholder="IPA" name="ipa" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester2-ips" placeholder="IPS" name="ips" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form id="editSemester3">
                                @csrf
                                <input type="hidden" class="semester3-id" name="id">
                                <td>3</td>
                                <td>Semester 3</td>
                                <td>
                                    <input type="number" class="form-control semester3-mtk" placeholder="MTK" name="mtk" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester3-bing" placeholder="BING" name="bing" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester3-bind" placeholder="BIND" name="bind" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester3-ipa" placeholder="IPA" name="ipa" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester3-ips" placeholder="IPS" name="ips" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form id="editSemester4">
                                @csrf
                                <input type="hidden" class="semester4-id" name="id">
                                <td>4</td>
                                <td>Semester 4</td>
                                <td>
                                    <input type="number" class="form-control semester4-mtk" placeholder="MTK" name="mtk" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester4-bing" placeholder="BING" name="bing" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester4-bind" placeholder="BIND" name="bind" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester4-ipa" placeholder="IPA" name="ipa" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester4-ips" placeholder="IPS" name="ips" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                            </form>
                        </tr>
                        <tr>
                            <form id="editSemester5">
                                @csrf
                                <input type="hidden" class="semester5-id" name="id">
                                <td>5</td>
                                <td>Semester 5</td>
                                <td>
                                    <input type="number" class="form-control semester5-mtk" placeholder="MTK" name="mtk" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester5-bing" placeholder="BING" name="bing" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester5-bind" placeholder="BIND" name="bind" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester5-ipa" placeholder="IPA" name="ipa" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control semester5-ips" placeholder="IPS" name="ips" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                            </form>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-update">Save Data</button>
            </div>
        </div>
    </div>
</div>


@endsection

@push('custom-script')
<script>

    $(document).ready(function () {
        readData();
    });

    function setNumberDecimal(event) {
        this.value = parseFloat(this.value).toFixed(3);
    }

    function readData(){
        $.ajax({
            type: "GET",
            url: "{{ route('getdata-score') }}",
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
                        {"data": "r_mtk"},
                        {"data": "r_bing"},
                        {"data": "r_bind"},
                        {"data": "r_ipa"},
                        {"data": "r_ips"},
                        {"data": "nisn"},
                    ],
                    "columnDefs":[
                        {
                            "targets" : 8,
                            "data" : "nisn",
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

// {

    // create Semester 1
    function createSemester1(){
        var form = $('#createSemester1');
        $.ajax({
            type: "POSt",
            url: "{{ route('create-semester1') }}",
            data: form.serialize(),
            success: function (result) {
                form.trigger('reset')
                console.log('Semester 1 : ',result.message);
            },
            error: function(xhr, error){
                console.log(error);
            }
        });
    }
    // create Semester 2
    function createSemester2(){
        var form = $('#createSemester2');
        $.ajax({
            type: "POSt",
            url: "{{ route('create-semester2') }}",
            data: form.serialize(),
            success: function (result) {
                form.trigger('reset')
                console.log('Semester 2 : ',result.message);
            },
            error: function(xhr, error){
                console.log(error);
            }
        });
    }
    // create Semester 3
    function createSemester3(){
        var form = $('#createSemester3');
        $.ajax({
            type: "POSt",
            url: "{{ route('create-semester3') }}",
            data: form.serialize(),
            success: function (result) {
                form.trigger('reset')
                console.log('Semester 3 : ',result.message);
            },
            error: function(xhr, error){
                console.log(error);
            }
        });
    }
    // create Semester 4
    function createSemester4(){
        var form = $('#createSemester4');
        $.ajax({
            type: "POSt",
            url: "{{ route('create-semester4') }}",
            data: form.serialize(),
            success: function (result) {
                form.trigger('reset')
                console.log('Semester 4 : ',result.message);
            },
            error: function(xhr, error){
                console.log(error);
            }
        });
    }
    // create Semester 5
    function createSemester5(){
        var form = $('#createSemester5');
        $.ajax({
            type: "POSt",
            url: "{{ route('create-semester5') }}",
            data: form.serialize(),
            success: function (result) {
                form.trigger('reset')
                console.log('Semester 5 : ',result.message);
            },
            error: function(xhr, error){
                console.log(error);
            }
        });
    }
    // create students
    $(document).on('click','.btn-create', function(e){
        e.preventDefault();

        var form = $('#createStudent');
        $.ajax({
            type: "POST",
            url: "{{ route('create-student') }}",
            data: form.serialize(),
            success: function (result) {
                $('.student_id').val(result.data.id);
                createSemester1();
                createSemester2();
                createSemester3();
                createSemester4();
                createSemester5();
                readData();
                $("#modalCreate").modal('hide');
                swal(result.message, "You clicked the button!", "success");
                form.trigger('reset')

            },
            error : function(xhr, error){
                console.log(xhr);
                console.log(error);
            }
        });
    })

// }

    $(document).on('click', '.btn-edit', function(e){
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: "{{ route('getdata-score') }}",
            data: {
                nisn: $(this).data('id'),
            },
            success: function (result) {
                if (result.data) {
                    var student = $('#editStudent');

                    var data = result.data;

                    // student {
                        student.find('input[name=id]').val(data.id);
                        student.find('input[name=name]').val(data.name);
                        student.find('input[name=nisn]').val(data.nisn);
                        student.find('select[name=jekel]').val(data.jekel);
                    // }

                    // semester1 {
                        $('.semester1-id').val(data.semester1.id);
                        $('.semester1-mtk').val(data.semester1.mtk);
                        $('.semester1-bing').val(data.semester1.bing);
                        $('.semester1-bind').val(data.semester1.bind);
                        $('.semester1-ipa').val(data.semester1.ipa);
                        $('.semester1-ips').val(data.semester1.ips);
                    // }
                    // semester2 {
                        $('.semester2-id').val(data.semester2.id);
                        $('.semester2-mtk').val(data.semester2.mtk);
                        $('.semester2-bing').val(data.semester2.bing);
                        $('.semester2-bind').val(data.semester2.bind);
                        $('.semester2-ipa').val(data.semester2.ipa);
                        $('.semester2-ips').val(data.semester2.ips);
                    // }
                    // semester3 {
                        $('.semester3-id').val(data.semester3.id);
                        $('.semester3-mtk').val(data.semester3.mtk);
                        $('.semester3-bing').val(data.semester3.bing);
                        $('.semester3-bind').val(data.semester3.bind);
                        $('.semester3-ipa').val(data.semester3.ipa);
                        $('.semester3-ips').val(data.semester3.ips);
                    // }
                    // semester4 {
                        $('.semester4-id').val(data.semester4.id);
                        $('.semester4-mtk').val(data.semester4.mtk);
                        $('.semester4-bing').val(data.semester4.bing);
                        $('.semester4-bind').val(data.semester4.bind);
                        $('.semester4-ipa').val(data.semester4.ipa);
                        $('.semester4-ips').val(data.semester4.ips);
                    // }
                    // semester5 {
                        $('.semester5-id').val(data.semester5.id);
                        $('.semester5-mtk').val(data.semester5.mtk);
                        $('.semester5-bing').val(data.semester5.bing);
                        $('.semester5-bind').val(data.semester5.bind);
                        $('.semester5-ipa').val(data.semester5.ipa);
                        $('.semester5-ips').val(data.semester5.ips);
                    // }

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

    // update Semester 1
    function updateSemester1(){
        var form = $('#editSemester1');
        $.ajax({
            type: "POSt",
            url: "{{ route('update-semester1','') }}/"+$('.semester1-id').val(),
            data: form.serialize(),
            success: function (result) {
                form.trigger('reset')
                console.log('Semester 1 : ',result.message);
            },
            error: function(xhr, error){
                console.log(error);
            }
        });
    }
    // create Semester 2
    function updateSemester2(){
        var form = $('#editSemester2');
        $.ajax({
            type: "POSt",
            url: "{{ route('update-semester2','') }}/"+$('.semester2-id').val(),
            data: form.serialize(),
            success: function (result) {
                form.trigger('reset')
                console.log('Semester 2 : ',result.message);
            },
            error: function(xhr, error){
                console.log(error);
            }
        });
    }
    // create Semester 3
    function updateSemester3(){
        var form = $('#editSemester3');
        $.ajax({
            type: "POSt",
            url: "{{ route('update-semester3','') }}/"+$('.semester3-id').val(),
            data: form.serialize(),
            success: function (result) {
                form.trigger('reset')
                console.log('Semester 3 : ',result.message);
            },
            error: function(xhr, error){
                console.log(error);
            }
        });
    }
    // create Semester 4
    function updateSemester4(){
        var form = $('#editSemester4');
        $.ajax({
            type: "POSt",
            url: "{{ route('update-semester4','') }}/"+$('.semester4-id').val(),
            data: form.serialize(),
            success: function (result) {
                form.trigger('reset')
                console.log('Semester 4 : ',result.message);
            },
            error: function(xhr, error){
                console.log(error);
            }
        });
    }
    // create Semester 5
    function updateSemester5(){
        var form = $('#editSemester5');
        $.ajax({
            type: "POSt",
            url: "{{ route('update-semester5','') }}/"+$('.semester5-id').val(),
            data: form.serialize(),
            success: function (result) {
                form.trigger('reset')
                console.log('Semester 5 : ',result.message);
            },
            error: function(xhr, error){
                console.log(error);
            }
        });
    }

    $(document).on('click', '.btn-update', function(e){
        e.preventDefault();
        var form = $('#editStudent');
        $.ajax({
            type: "POST",
            url: "{{ route('update-student','') }}/"+form.find("input[name=id]").val(),
            data: form.serialize(),
            success: function (result) {
                if(result.status){
                    updateSemester1();
                    updateSemester2();
                    updateSemester3();
                    updateSemester4();
                    updateSemester5();
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
                    url : "{{ route('delete-score','') }}/"+$(this).data('id'),
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
