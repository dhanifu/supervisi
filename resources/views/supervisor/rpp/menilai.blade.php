@extends('layouts.app')

@section('title', 'Supervisor | Menilai')

@section('content')


<h1 class="h3 mb-0 text-gray-800">Menilai RPP</h1>
{{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Button</a> --}}
<p class="mb-4">"untuk melihat filenya, klik titik 3 biru dikolom 'Act' dan pilih
    lihat file".</p>
<div class="row">
    <div class="col-lg-12">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show wow slideInDown" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ section('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">RPP</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama RPP</th>
                                <th>Pengupload</th>
                                <th>Tgl/waktu Upload</th>
                                <th>Nilai</th>
                                <th>Status</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rpp as $r)
                            <tr>
                                <td>
                                    <span title="{{$r->nama_rpp}}">
                                        @if ( strlen($r->nama_rpp) > 30 )
                                            {{ substr($r->nama_rpp, 0, 30) }}....
                                        @else
                                            {{ $r->nama_rpp }}
                                        @endif
                                    </span>
                                </td>
                                <td>{{ $r->name }}</td>
                                <td>{{ $r->created_at->format('d M Y') }} || {{ $r->created_at->format('H:i') }}</td>
                                <td>
                                    @if($r->nilai == '')
                                    <span class="text-warning center">
                                        <i class="fas fa-minus-circle" title="Belum Dinilai"></i>
                                    </span>
                                    @else
                                    {{ $r->nilai }}
                                    @endif
                                </td>
                                <td align="center">
                                    @if ( $r->status == 'belum' )
                                    <span class="text-warning"><i class="fas fa-minus-circle" title="Belum Disetujui"></i></span>
                                    @elseif ( $r->status == 0 )
                                    <span class="text-danger"><i class="fas fa-times-circle" title="Tidak Disetujui"></i></span>
                                    @elseif ( $r->status == 1 )
                                    <span class="text-success"><i class="fas fa-check-circle" title="Disetujui"></i></span>
                                    @endif
                                </td>
                                <td align="center">
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h fa-sm fa-fw text-blue-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right mr-4 shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Action:</div>
                                            @if ( $r->nilai == null )
                                                <a href="#menilai" type="button" class="dropdown-item" data-toggle="modal"
                                                        data-target="#modalMenilai" data-rppid="{{$r->id}}">
                                                    Nilai RPP ini
                                                </a>
                                            @else
                                                <a href="#edit-nilai" type="button" class="dropdown-item" data-toggle="modal"
                                                        data-target="#editNilai" data-rppid="{{$r->id}}"
                                                        data-nilai="{{$r->nilai}}">
                                                    Edit Nilai
                                                </a>
                                            @endif
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ asset('documents/rpp/'.$r->rpp) }}" target="_blank">Lihat file</a>
                                        </div>
                                    </div>
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


<!-- Modal Menilai RPP -->
<div class="modal fade" id="modalMenilai" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="modalMenilaiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMenilaiLabel">Menilai RPP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('supervisor.rpp.menilai.post') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nilai" class="col-form-label">Nilai</label>
                        <input type="number" class="form-control" name="nilai" id="nilai" value="{{ old('nilai') }}">
                        <input type="hidden" name="rpp_id" id="rpp_id" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Nilai RPP -->
<div class="modal fade" id="editNilai" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="editNilaiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNilaiLabel">Edit Nilai RPP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('supervisor.rpp.menilai.edit') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nilai" class="col-form-label">Nilai</label>
                        <input type="number" class="form-control" name="nilai" id="nilai">
                        <input type="hidden" name="rpp_id" id="rpp_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('js')
<script>
    $('#modalMenilai').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let rppid = button.data('rppid')
        let modal = $(this)

        modal.find('.modal-body #rpp_id').val(rppid)
    })
    $('#editNilai').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let rppid = button.data('rppid')
            nilai = button.data('nilai')
        let modal = $(this)

        modal.find('.modal-body #rpp_id').val(rppid)
        modal.find('.modal-body #nilai').val(nilai)
    })
</script>
@endsection
