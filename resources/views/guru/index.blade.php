@extends('layouts.app')

@section('title', 'GURU | Upload RPP')
@section('active-guru-upload', 'active')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 text-gray-800">Upload File RPP</h1>
    <button class="btn btn-sm btn-primary shadow" data-toggle="modal" data-target="#modalUpload">
        <i class="fas fa-upload fa-sm text-white-50"></i> Upload RPP
    </button>
</div>

<div class="row">
    <div class="col-lg-12">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show wow slideInDown shadow" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
            {{ section('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card mb-4 shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data RPP</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Upload</th>
                                <th>Nama RPP</th>
                                <th>Nilai</th>
                                <th>Status</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rpp as $r)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $r->created_at->format('d M Y') }}</td>
                                <td>
                                    <span title="{{$r->nama_rpp}}">
                                        @if ( strlen($r->nama_rpp) > 30 )
                                        {{ substr($r->nama_rpp, 0, 30) }}....
                                        @else
                                        {{ $r->nama_rpp }}
                                        @endif
                                    </span>
                                </td>
                                <td style="text-align: center; width: 70px">
                                    @if($r->nilai == '')
                                    <span class="text-warning"><i class="fas fa-minus-circle"
                                            title="Belum Dinilai"></i></span>
                                    @else
                                    {{ $r->nilai }}
                                    @endif
                                </td>
                                <td style="text-align: center; width: 50px">
                                    @if ( $r->status == 'belum' )
                                    <span class="text-warning"><i class="fas fa-minus-circle"
                                            title="Belum Disetujui"></i></span>
                                    @elseif ( $r->status == 0 )
                                    <span class="text-danger"><i class="fas fa-times-circle"
                                            title="Tidak Disetujui"></i></span>
                                    @elseif ( $r->status == 1 )
                                    <span class="text-success"><i class="fas fa-check-circle"
                                            title="Disetujui"></i></span>
                                    @endif
                                </td>
                                <td align="center">
                                    <button type="button" class="btn btn-info btn-sm btn-circle" data-toggle="modal"
                                        data-target="#modalEdit" data-id="{{$r->id}}" data-namarpp="{{$r->nama_rpp}}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm btn-circle" data-toggle="modal"
                                        data-target="#modalDelete" data-id="{{$r->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal upload rpp -->
<div class="modal fade" id="modalUpload" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="modalUploadLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUploadLabel">Upload RPP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('guru.rpp.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_rpp">Namai RPP anda <span class="text-danger">*</span></label>
                                <input type="text" name="nama_rpp" id="nama_rpp"
                                    class="form-control @error('nama_rpp') is-invalid @enderror"
                                    value="{{ old('nama_rpp') }}" placeholder="Namai RPPnya" maxlength="100">

                                @error('nama_rpp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="rpp">Pilih File RPP (<u>pdf, jpg, png</u>) <span
                                        class="text-danger">*</span></label>
                                <input type="file" name="rpp" id="rpp"
                                    class="form-control @error('rpp') is-invalid @enderror" value="{{ old('rpp') }}">

                                @error('rpp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal upload -->




<!-- modal edit -->
<div class="modal fade" id="modalEdit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edit RPP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('guru.rpp.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_rpp" class="col-form-label">Nama RPP</label>
                                <input type="text" class="form-control" name="nama_rpp" id="nama_rpp"
                                    value="{{ old('nama_rpp') }}">
                                <input type="hidden" name="rpp_id" id="rpp_id">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="rpp">File RPP (pdf, jpg, png)</label>
                                <input type="file" name="rpp" id="rpp" class="form-control">
                                <label>Jika tidak ingin mengubah filenya, kosongkan ini</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal edit -->



<!-- modal delete -->
<div class="modal fade" id="modalDelete" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="modalDeleteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteLabel">Delete RPP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin untuk menghapus file ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="delete">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal delete -->
@endsection

@section('js')
<script>
    @if(count($errors) > 0)
        $('#modalUpload').modal('show');
    @endif

    $('#modalEdit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var rpp_id = button.data('id')
        nama_rpp = button.data('namarpp');
        var modal = $(this)

        modal.find('.modal-body #rpp_id').val(rpp_id)
        modal.find('.modal-body #nama_rpp').val(nama_rpp)
    })

    $(document).ready(function () {

        $('#modalDelete').on('show.bs.modal', function (e) {
            id = $(e.relatedTarget).data('id');
            $('#delete').on('click', function () {
                $('#modalDelete').modal('hide');
                $.ajax({
                    type: "GET",
                    url: "{{ route('guru.rpp.delete') }}",
                    data: {
                        '_token': $('input[name="_token"').val(),
                        'id': id,
                    },
                    success: function (data) {
                        // $('#al').modal(data);   
                        // $('#lala').html(data).load('admin.slider.index');
                        // $('#table').reload(data);
                        location.reload(true);
                        alert('Data Berhasil di Hapus');
                    },
                });
            });

        });

    });

</script>
@endsection
