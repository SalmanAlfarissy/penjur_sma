@extends('layouts.main')

@section('title','Penjur SMA')
@section('page_title','Students')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Students</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        {{-- <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modalCreate">
            <i class="fa fa-plus"></i> Tambah Data
        </button> --}}
        <div class="btn-group">
            <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</button>
            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu" style="">
              <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalCreate">Manual</button>
              <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modalImport">Excel</button>
            </div>
        </div>
    </div>
    <div class="col-md-9">
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

<!-- Modal Import-->
<div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <form id="form-import" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Import Data Excel</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Input excel ...<a href="excel/template.xlsx" target="_blank" rel="noopener noreferrer">template.xlsx</a> </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="fileExcel" name="fileExcel">
                        <label class="custom-file-label" for="fileExcel">Choose file</label>
                    </div>
                    <div class="text-danger fileExcel-error"></div>
                </div>

                <div class="col-md-12">
                    <div class="card-header">
                        <h3 class="card-title">List Data</h3>
                    </div>
                    <div class="card">

                        <div class="card-body table-responsive">
                            <table class="table table-bordered text-nowrap" id="tableImport">
                                <thead>
                                    <tr>
                                        <th colspan="4"></th>
                                        <th colspan="5" style="text-align: center">Semester 1</th>
                                        <th colspan="5" style="text-align: center">Semester 2</th>
                                        <th colspan="5" style="text-align: center">Semester 3</th>
                                        <th colspan="5" style="text-align: center">Semester 4</th>
                                        <th colspan="5" style="text-align: center">Semester 5</th>
                                    </tr>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Nisn</th>
                                        <th>Jekel</th>
                                        <th>MTK</th>
                                        <th>BING</th>
                                        <th>BIND</th>
                                        <th>IPA</th>
                                        <th>IPS</th>
                                        <th>MTK</th>
                                        <th>BING</th>
                                        <th>BIND</th>
                                        <th>IPA</th>
                                        <th>IPS</th>
                                        <th>MTK</th>
                                        <th>BING</th>
                                        <th>BIND</th>
                                        <th>IPA</th>
                                        <th>IPS</th>
                                        <th>MTK</th>
                                        <th>BING</th>
                                        <th>BIND</th>
                                        <th>IPA</th>
                                        <th>IPS</th>
                                        <th>MTK</th>
                                        <th>BING</th>
                                        <th>BIND</th>
                                        <th>IPA</th>
                                        <th>IPS</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
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
                            <div class="text-danger name-error"></div>
                        </div>

                        <div class="form-group">
                            <label>Nisn</label>
                            <input type="text" class="form-control" placeholder="Nisn" name="nisn" required>
                            <div class="text-danger nisn-error"></div>
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
                                    <input type="number" class="form-control rangenumber" placeholder="MTK" name="mtk" min="0" max="100" step="0.001">
                                    <div class="text-danger s1mtk-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="BING" name="bing" min="0" max="100" step="0.001">
                                    <div class="text-danger s1bing-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="BIND" name="bind" min="0" max="100" step="0.001">
                                    <div class="text-danger s1bind-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="IPA" name="ipa" min="0" max="100" step="0.001">
                                    <div class="text-danger s1ipa-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="IPS" name="ips" min="0" max="100" step="0.001">
                                    <div class="text-danger s1ips-error"></div>
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
                                    <input type="number" class="form-control rangenumber" placeholder="MTK" name="mtk" min="0" max="100" step="0.001">
                                    <div class="text-danger s2mtk-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="BING" name="bing" min="0" max="100" step="0.001">
                                    <div class="text-danger s2bing-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="BIND" name="bind" min="0" max="100" step="0.001">
                                    <div class="text-danger s2bind-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="IPA" name="ipa" min="0" max="100" step="0.001">
                                    <div class="text-danger s2ipa-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="IPS" name="ips" min="0" max="100" step="0.001">
                                    <div class="text-danger s2ips-error"></div>
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
                                    <input type="number" class="form-control rangenumber" placeholder="MTK" name="mtk" min="0" max="100" step="0.001">
                                    <div class="text-danger s3mtk-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="BING" name="bing" min="0" max="100" step="0.001">
                                    <div class="text-danger s3bing-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="BIND" name="bind" min="0" max="100" step="0.001">
                                    <div class="text-danger s3bind-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="IPA" name="ipa" min="0" max="100" step="0.001">
                                    <div class="text-danger s3ipa-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="IPS" name="ips" min="0" max="100" step="0.001">
                                    <div class="text-danger s3ips-error"></div>
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
                                    <input type="number" class="form-control rangenumber" placeholder="MTK" name="mtk" min="0" max="100" step="0.001">
                                    <div class="text-danger s4mtk-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="BING" name="bing" min="0" max="100" step="0.001">
                                    <div class="text-danger s4bing-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="BIND" name="bind" min="0" max="100" step="0.001">
                                    <div class="text-danger s4bind-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="IPA" name="ipa" min="0" max="100" step="0.001">
                                    <div class="text-danger s4ipa-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="IPS" name="ips" min="0" max="100" step="0.001">
                                    <div class="text-danger s4ips-error"></div>
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
                                    <input type="number" class="form-control rangenumber" placeholder="MTK" name="mtk" min="0" max="100" step="0.001">
                                    <div class="text-danger s5mtk-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="BING" name="bing" min="0" max="100" step="0.001">
                                    <div class="text-danger s5bing-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="BIND" name="bind" min="0" max="100" step="0.001">
                                    <div class="text-danger s5bind-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="IPA" name="ipa" min="0" max="100" step="0.001">
                                    <div class="text-danger s5ipa-error"></div>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber" placeholder="IPS" name="ips" min="0" max="100" step="0.001">
                                    <div class="text-danger s5ips-error"></div>
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
                            <input type="text" class="form-control rangenumber" placeholder="Name" name="name" required>
                            <input type="hidden" name="id">
                        </div>

                        <div class="form-group">
                            <label>Nisn</label>
                            <input type="text" class="form-control rangenumber" placeholder="Nisn" name="nisn" required>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control rangenumber" name="jekel">
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
                                    <input type="number" class="form-control rangenumber semester1-mtk" placeholder="MTK" name="mtk" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester1-bing" placeholder="BING" name="bing" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester1-bind" placeholder="BIND" name="bind" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester1-ipa" placeholder="IPA" name="ipa" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester1-ips" placeholder="IPS" name="ips" min="0" max="100" step="0.001" value="0.000" required>
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
                                    <input type="number" class="form-control rangenumber semester2-mtk" placeholder="MTK" name="mtk" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester2-bing" placeholder="BING" name="bing" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester2-bind" placeholder="BIND" name="bind" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester2-ipa" placeholder="IPA" name="ipa" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester2-ips" placeholder="IPS" name="ips" min="0" max="100" step="0.001" value="0.000" required>
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
                                    <input type="number" class="form-control rangenumber semester3-mtk" placeholder="MTK" name="mtk" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester3-bing" placeholder="BING" name="bing" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester3-bind" placeholder="BIND" name="bind" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester3-ipa" placeholder="IPA" name="ipa" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester3-ips" placeholder="IPS" name="ips" min="0" max="100" step="0.001" value="0.000" required>
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
                                    <input type="number" class="form-control rangenumber semester4-mtk" placeholder="MTK" name="mtk" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester4-bing" placeholder="BING" name="bing" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester4-bind" placeholder="BIND" name="bind" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester4-ipa" placeholder="IPA" name="ipa" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester4-ips" placeholder="IPS" name="ips" min="0" max="100" step="0.001" value="0.000" required>
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
                                    <input type="number" class="form-control rangenumber semester5-mtk" placeholder="MTK" name="mtk" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester5-bing" placeholder="BING" name="bing" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester5-bind" placeholder="BIND" name="bind" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester5-ipa" placeholder="IPA" name="ipa" min="0" max="100" step="0.001" value="0.000" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control rangenumber semester5-ips" placeholder="IPS" name="ips" min="0" max="100" step="0.001" value="0.000" required>
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
    var createposition = 0;
    $(document).ready(function () {
        readData();
    });

    $(document).on('input', '#form-import',function (e) {
        e.preventDefault();
        let form = $(this);
        let formData = new FormData(form[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('getDataImport') }}",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            success: function (result) {
                $('#tableImport').DataTable({
                    "paging":true,
                    "ordering":true,
                    "destroy":true,
                    "data": result.data,
                    "columns": [
                        {"data": "no"},
                        {"data": "name"},
                        {"data": "nisn"},
                        {"data": "jekel"},
                        {"data": "mtk1"},
                        {"data": "bing1"},
                        {"data": "bind1"},
                        {"data": "ipa1"},
                        {"data": "ips1"},
                        {"data": "mtk2"},
                        {"data": "bing2"},
                        {"data": "bind2"},
                        {"data": "ipa2"},
                        {"data": "ips2"},
                        {"data": "mtk3"},
                        {"data": "bing3"},
                        {"data": "bind3"},
                        {"data": "ipa3"},
                        {"data": "ips3"},
                        {"data": "mtk4"},
                        {"data": "bing4"},
                        {"data": "bind4"},
                        {"data": "ipa4"},
                        {"data": "ips4"},
                        {"data": "mtk5"},
                        {"data": "bing5"},
                        {"data": "bind5"},
                        {"data": "ipa5"},
                        {"data": "ips5"},
                    ]
                });
            },
            error: function (xhr, error) {
                console.log(error);
            }
        });
    });

    $(document).on('submit', '#form-import',function (e) {
        e.preventDefault();
        let form = $(this);
        let formData = new FormData(form[0]);
        $.ajax({
            type: "POST",
            url: "{{ route('importData') }}",
            data: formData,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            success: function (result) {
                swal(result.message, "You clicked the button!", "success");
                $(".fileExcel-error").text('');
                $("#modalImport").modal('hide');
                form.trigger('reset');
                readData();
            },
            error: function (xhr, error) {
                var err = xhr.responseJSON.errors;
                var errorfile = err.fileExcel ?? '';
                $(".fileExcel-error").text(errorfile);
            }
        });
    });


    $('.rangenumber').on('input',function(){
        var value = $(this).val();
        if ((value !== '') && (value.indexOf('.') === -1)) {

            $(this).val(Math.max(Math.min(value, 100), 0));
        }
    })

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
                console.log('Semester 1 : ',result.message);
                createposition = createposition + 1;
            },
            error: function(xhr, error){
                var err = xhr.responseJSON.errors;
                var mtk = err.mtk ?? '';
                var bing = err.bing ?? '';
                var bind = err.bind ?? '';
                var ipa = err.ipa ?? '';
                var ips = err.ips ?? '';
                $(".s1mtk-error").text(xhr.responseJSON.errors.mtk);

                $(".s1bing-error").text(xhr.responseJSON.errors.bing);

                $(".s1bind-error").text(xhr.responseJSON.errors.bind);

                $(".s1ipa-error").text(xhr.responseJSON.errors.ipa);

                $(".s1ips-error").text(xhr.responseJSON.errors.ips);

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
                console.log('Semester 2 : ',result.message);
                createposition = createposition + 1;
            },
            error: function(xhr, error){
                var err = xhr.responseJSON.errors;
                var mtk = err.mtk ?? '';
                var bing = err.bing ?? '';
                var bind = err.bind ?? '';
                var ipa = err.ipa ?? '';
                var ips = err.ips ?? '';
                $(".s2mtk-error").text(xhr.responseJSON.errors.mtk);

                $(".s2bing-error").text(xhr.responseJSON.errors.bing);

                $(".s2bind-error").text(xhr.responseJSON.errors.bind);

                $(".s2ipa-error").text(xhr.responseJSON.errors.ipa);

                $(".s2ips-error").text(xhr.responseJSON.errors.ips);
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
                console.log('Semester 3 : ',result.message);
                createposition = createposition + 1;
            },
            error: function(xhr, error){
                var err = xhr.responseJSON.errors;
                var mtk = err.mtk ?? '';
                var bing = err.bing ?? '';
                var bind = err.bind ?? '';
                var ipa = err.ipa ?? '';
                var ips = err.ips ?? '';
                $(".s3mtk-error").text(xhr.responseJSON.errors.mtk);

                $(".s3bing-error").text(xhr.responseJSON.errors.bing);

                $(".s3bind-error").text(xhr.responseJSON.errors.bind);

                $(".s3ipa-error").text(xhr.responseJSON.errors.ipa);

                $(".s3ips-error").text(xhr.responseJSON.errors.ips);
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
                console.log('Semester 4 : ',result.message);
                createposition = createposition + 1;
            },
            error: function(xhr, error){
                var err = xhr.responseJSON.errors;
                var mtk = err.mtk ?? '';
                var bing = err.bing ?? '';
                var bind = err.bind ?? '';
                var ipa = err.ipa ?? '';
                var ips = err.ips ?? '';
                $(".s4mtk-error").text(xhr.responseJSON.errors.mtk);

                $(".s4bing-error").text(xhr.responseJSON.errors.bing);

                $(".s4bind-error").text(xhr.responseJSON.errors.bind);

                $(".s4ipa-error").text(xhr.responseJSON.errors.ipa);

                $(".s4ips-error").text(xhr.responseJSON.errors.ips);
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
                console.log('Semester 5 : ',result.message);
                readData();
                $("#modalCreate").modal('hide');
                swal(result.message, "You clicked the button!", "success");
                $('#createStudent').trigger("reset");
                $('#createSemester1').trigger("reset");
                $('#createSemester2').trigger("reset");
                $('#createSemester3').trigger("reset");
                $('#createSemester4').trigger("reset");
                $('#createSemester5').trigger("reset");
            },
            error: function(xhr, error){
                var err = xhr.responseJSON.errors;
                var mtk = err.mtk ?? '';
                var bing = err.bing ?? '';
                var bind = err.bind ?? '';
                var ipa = err.ipa ?? '';
                var ips = err.ips ?? '';
                $(".s5mtk-error").text(xhr.responseJSON.errors.mtk);

                $(".s5bing-error").text(xhr.responseJSON.errors.bing);

                $(".s5bind-error").text(xhr.responseJSON.errors.bind);

                $(".s5ipa-error").text(xhr.responseJSON.errors.ipa);

                $(".s5ips-error").text(xhr.responseJSON.errors.ips);
            }
        });
    }
    // create students
    function createStudent(){
        var form = $('#createStudent');
        $.ajax({
            type: "POST",
            url: "{{ route('create-student') }}",
            data: form.serialize(),
            success: function (result) {
                $('.student_id').val(result.data.id);
                createposition = createposition + 1;
                createSemester1();
                createSemester2();
                createSemester3();
                createSemester4();
                createSemester5();
            },
            error : function(xhr, error){
                var err = xhr.responseJSON.errors;
                var name = err.name ?? '';
                var nisn = err.nisn ?? '';
                $(".name-error").text(name);
                $(".nisn-error").text(nisn);

            }
        });
    }
    $(document).on('click','.btn-create', function(e){
        e.preventDefault();
        if (createposition == 0) {
            createStudent();
        }else if(createposition == 1){
            createSemester1();
            createSemester2();
            createSemester3();
            createSemester4();
            createSemester5();
        }else if (createposition == 2) {
            createSemester2();
            createSemester3();
            createSemester4();
            createSemester5();
        }else if (createposition == 3) {
            createSemester3();
            createSemester4();
            createSemester5();
        }else if (createposition == 4) {
            createSemester4();
            createSemester5();
        }else if (createposition == 5) {
            createSemester5();
        }else {
            swal("please complete the form! ", "You clicked the button!", "warning");
        }


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
