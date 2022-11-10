@extends('layouts.main')

@section('title','Penjur SMA')
@section('page_title','Jurusan')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item active">Jurusan</li>
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
    <div class="col-md-2">
        <div class="btn-group">
            <button type="button" class="btn btn-info"><i class="fa fa-print"></i> Cetak</button>
            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" target="_blank" href="{{ route('cetak-pdf') }}">All</a>
              <a class="dropdown-item" target="_blank" href="{{ route('cetak-pdf') }}?jurusan=IPA">IPA</a>
              <a class="dropdown-item" target="_blank" href="{{ route('cetak-pdf') }}?jurusan=IPS">IPS</a>
            </div>
        </div>
    </div>
    <div class="col-md-8">
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
                            <th>Nilai</th>
                            <th>Jurusan</th>
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
                    <form class="col-md-6" id="createJurusan">
                        @csrf
                        <div class="form-group">
                            <label>Name & NISN</label>
                            <select class="form-control select2-create" style="width: 100%;" name="nisn" required>
                                <option selected value="">==Please Select Item==</option>
                                @foreach ($data as $item )
                                    <option value="{{ $item->nisn }}">{{ $item->name }} - {{ $item->nisn }}</option>
                                @endforeach

                            </select>
                            <div class="text-danger nisn-error"></div>
                        </div>
                        <input type="hidden" class="result" name="result">
                        <input type="hidden" class="jurusan" name="jurusan">
                    </form>
                    <div class="col-md-6 ml-auto"></div>
                </div>
                <div class="from-group">
                    <label>Rata - Rata Nilai</label>
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>Mata Pelajaran</th>
                            <th>Rata-Rata Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <form id="createSemester1">
                                  @csrf
                                  <td>MTK</td>
                                  <td>
                                      <input type="hidden" name="mtk" class="r_mtk">
                                      <input type="number" class="form-control r_mtk" placeholder="MTK" name="mtk" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" disabled>
                                  </td>
                              </form>
                          </tr>
                          <tr>
                              <form id="createSemester2">
                                  @csrf
                                  <td>BING</td>
                                  <td>
                                      <input type="hidden" name="bing" class="r_bing">
                                      <input type="number" class="form-control r_bing" placeholder="BING" name="bing" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" disabled>
                                  </td>
                              </form>
                          </tr>
                          <tr>
                              <form id="createSemester3">
                                  @csrf
                                  <td>BIND</td>
                                  <td>
                                      <input type="hidden" name="bind" class="r_bind">
                                      <input type="number" class="form-control r_bind" placeholder="BIND" name="bind" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" disabled>
                                  </td>
                              </form>
                          </tr>
                          <tr>
                              <form id="createSemester4">
                                  @csrf
                                  <td>IPA</td>
                                  <td>
                                      <input type="hidden" name="ipa" class="r_ipa">
                                      <input type="number" class="form-control r_ipa" placeholder="IPA" name="ipa" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" disabled>
                                  </td>
                              </form>
                          </tr>
                          <tr>
                              <form id="createSemester5">
                                  @csrf
                                  <td>IPS</td>
                                  <td>
                                      <input type="hidden" name="ips" class="r_ips">
                                      <input type="number" class="form-control r_ips" placeholder="IPS" name="ips" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" disabled>
                                  </td>
                              </form>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <div class="from-group">
                    <label>Hasil</label>
                </div>
                <form class="col-md-6">
                    <div class="form-group">
                        <label>Result Value</label>
                        <input type="number" class="form-control result" placeholder="Result Value" name="result" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" disabled>
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" class="form-control jurusan" placeholder="Jurusan" name="jurusan" disabled>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-create">Save Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit-->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form class="col-md-6" id="editJurusan">
                        @csrf
                        <div class="form-group">
                            <label>Name & NISN</label>
                            <input type="text" class="form-control" placeholder="name" name="nisn"  disabled>
                        </div>
                        <input type="hidden" name="nisn" class="nisn">
                        <input type="hidden" class="result" name="result">
                        <input type="hidden" class="jurusan" name="jurusan">
                    </form>
                    <div class="col-md-6 ml-auto"></div>
                </div>
                <div class="from-group">
                    <label>Rata - Rata Nilai</label>
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>Mata Pelajaran</th>
                            <th>Rata-Rata Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <form id="editSemester1">
                                  @csrf
                                  <td>MTK</td>
                                  <td>
                                      <input type="hidden" name="mtk" class="r_mtk">
                                      <input type="number" class="form-control r_mtk" placeholder="MTK" name="mtk" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" disabled>
                                  </td>
                              </form>
                          </tr>
                          <tr>
                              <form id="editSemester2">
                                  @csrf
                                  <td>BING</td>
                                  <td>
                                      <input type="hidden" name="bing" class="r_bing">
                                      <input type="number" class="form-control r_bing" placeholder="BING" name="bing" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" disabled>
                                  </td>
                              </form>
                          </tr>
                          <tr>
                              <form id="editSemester3">
                                  @csrf
                                  <td>BIND</td>
                                  <td>
                                      <input type="hidden" name="bind" class="r_bind">
                                      <input type="number" class="form-control r_bind" placeholder="BIND" name="bind" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" disabled>
                                  </td>
                              </form>
                          </tr>
                          <tr>
                              <form id="editSemester4">
                                  @csrf
                                  <td>IPA</td>
                                  <td>
                                      <input type="hidden" name="ipa" class="r_ipa">
                                      <input type="number" class="form-control r_ipa" placeholder="IPA" name="ipa" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" disabled>
                                  </td>
                              </form>
                          </tr>
                          <tr>
                              <form id="editSemester5">
                                  @csrf
                                  <td>IPS</td>
                                  <td>
                                      <input type="hidden" name="ips" class="r_ips">
                                      <input type="number" class="form-control r_ips" placeholder="IPS" name="ips" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" disabled>
                                  </td>
                              </form>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <div class="from-group">
                    <label>Hasil</label>
                </div>
                <form class="col-md-6">
                    <div class="form-group">
                        <label>Result Value</label>
                        <input type="number" class="form-control result" placeholder="Result Value" name="result" onchange="setNumberDecimal" min="0" max="100" step="0.001" value="0.000" disabled>
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" class="form-control jurusan" placeholder="Jurusan" name="jurusan" disabled>
                    </div>
                </form>
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

    function resultValue(nisn){
        $.ajax({
            type: "GET",
            url: "{{ route('resultvalue-jurusan') }}",
            data: {
                nisn: nisn,
            },
            success: function (result) {
                var data = result.data;
                $('.result').val(data.tot_value);
                $('.jurusan').val(data.jurusan);
                $('.nisn').val(data.nisn);
            }
        });
    }

    $('.select2-edit').select2({
        theme: 'bootstrap4',
        dropdownParent: $("#editJurusan"),
    });

    $('.select2-create').select2({
        theme: 'bootstrap4',
        dropdownParent: $("#createJurusan"),
    }).on('change', function(e){
        e.preventDefault()
        $.ajax({
            type: "GET",
            url: "{{ route('getdata-score') }}",
            data: {
                nisn: $('#createJurusan').find('select[name=nisn]').val(),
            },
            success: function (result) {
                if (result.data) {
                    var data = result.data;

                    // rata-rata nilai {
                        $('.r_mtk').val(data.r_mtk);
                        $('.r_bing').val(data.r_bing);
                        $('.r_bind').val(data.r_bind);
                        $('.r_ipa').val(data.r_ipa);
                        $('.r_ips').val(data.r_ips);
                    // }
                    //result
                    var nisn = data.nisn;
                    resultValue(nisn);

                }else{
                    alert('Data not found!!');
                }
            },
            error: function(xhr, error){
                console.log(xhr);
                console.log(error);
            }
        });
    })

    function setNumberDecimal(event) {
        this.value = parseFloat(this.value).toFixed(3);
    }

    function readData(){
        $.ajax({
            type: "GET",
            url: "{{ route('getdata-jurusan') }}",
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
                        {"data": "result"},
                        {"data": "jurusan"},
                        {"data": "nisn"},
                    ],
                    "columnDefs":[
                        {
                            "targets" : 5,
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

    // create jurusan
    $(document).on('click','.btn-create', function(e){
        e.preventDefault();

        var form = $('#createJurusan');
        $.ajax({
            type: "POST",
            url: "{{ route('create-jurusan') }}",
            data: form.serialize(),
            success: function (result) {
                $("#modalCreate").modal('hide');
                swal(result.message, "You clicked the button!", "success").then(function(){
                    window.location.reload();
                });
                form.trigger('reset')

            },
            error : function(xhr, error){
                var err = xhr.responseJSON.errors.nisn != null ? "Please select this item" : "";
                $('.nisn-error').text(err);
            }
        });
    })

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
                    var data = result.data;

                    // rata-rata nilai {
                        $('.r_mtk').val(data.r_mtk);
                        $('.r_bing').val(data.r_bing);
                        $('.r_bind').val(data.r_bind);
                        $('.r_ipa').val(data.r_ipa);
                        $('.r_ips').val(data.r_ips);
                    // }
                    //result
                    var nisn = data.nisn;
                    $('#editJurusan').find('input[name=nisn]').val(data.name+' - '+nisn);
                    resultValue(nisn);
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


    $(document).on('click', '.btn-update', function(e){
        e.preventDefault();
        var form = $('#editJurusan');
        $.ajax({
            type: "POST",
            url: "{{ route('update-jurusan','') }}/"+$(".nisn").val(),
            data: form.serialize(),
            success: function (result) {
                if(result.status){
                    $("#modalEdit").modal('hide');
                    swal(result.message, "You clicked the button!", "success").then(function(){
                        window.location.reload();
                    });
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
                    url : "{{ route('delete-jurusan','') }}/"+$(this).data('id'),
                    type : 'POST',
                    data : {
                        _token: inputToken.val(),
                    }
                }).done(function(result){

                    inputToken.val(result.newToken);
                    if(result.status){
                        swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                        }).then(function(){
                            window.location.reload();
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
