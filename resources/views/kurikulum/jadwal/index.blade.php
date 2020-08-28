@extends('layouts.app')

@section('title', 'Kurikulum - Jadwal')
@section('active-kurikulum-pilih', 'active')
@section('show-kurikulum-pilih', 'show')
@section('active-kurikulum-jadwal', 'active')

@section('content')
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Supervisor</h1>
</div>

<!-- Content Row -->
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
        <div class="card mb-4 shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jadwal</h6>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama Supervisor</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                            <tr>
                                <td>{{ $u->nip }}</td>
                                <td>{{ $u->name }}</td>
                                <td align="center">
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h fa-sm fa-fw text-blue-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right mr-4 shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Action:</div>
                                            <a href="{{ route('kurikulum.jadwal.lihat', $u->id) }}" class="dropdown-item">
                                                Lihat Semua Jadwal
                                            </a>
                                            <a href="#buat-jadwal" type="button" class="dropdown-item" data-toggle="modal"
                                                    data-target="#modalBuatJadwal" data-id="{{$u->id}}" data-nip="{{$u->nip}}">
                                                Buat Jadwal
                                            </a>
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


<!-- MODAL BUAT JADWAL -->
<div class="modal fade" id="modalBuatJadwal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="modalBuatJadwalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalBuatJadwalLabel">Buat Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kurikulum.jadwal.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="tanggal" class="col-md-3 col-form-label">Tanggal</label>
                            <div class="col-md-9">
                                <input type="hidden" name="nip" id="nip">
                                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="waktu" class="col-form-label">Waktu</label>
                                <input type="hidden" name="id" id="id">
                                <input type="time" name="waktu" id="waktu" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="waktu" class="col-form-label">Sampai</label>
                                <input type="time" name="sampai" id="sampai" class="form-control" required>
                            </div>
                        </div>
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
        $('#modalBuatJadwal').on('show.bs.modal', function(e){
            let button = $(e.relatedTarget)
            let id = button.data('id')
                nip = button.data('nip')

            let modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #nip').val(nip)
            
        })
    </script>
@endsection