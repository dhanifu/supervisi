@extends('layouts.app')

@section('title', 'Kurikulum - Jadwal')
@section('active-kurikulum-pilih', 'active')
@section('show-kurikulum-pilih', 'show')
@section('active-kurikulum-jadwal', 'active')

@section('content')
<h1 class="h3 mb-0 text-gray-800">Jadwal-Jadwal
    <button type="button" class="btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal"
        data-target="#modalBuatJadwal">
        <i class="fas fa-calendar-plus fa-sm text-white-50"></i> Buat Jadwal
    </button>
</h1>
<p class="mt-2">NIP: {{$user->nip}} | Nama: {{$user->name}}</p>

<!-- Content Row -->
<div class="row">
    <div class="col-lg-12">
        @if (session('success'))
        <div class="alert alert-success shadow alert-dismissible fade show wow slideInDown" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger shadow alert-dismissible fade show" role="alert">
            {{ section('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card mb-4 shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jadwal
                    <button type="button" onclick="document.location.href='{{route('kurikulum.jadwal.index')}}'"
                            class="btn btn-sm btn-primary float-right">
                        <i class="fas fa-chevron-left text-white-50"></i> Back
                    </button>
                </h6>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Sampai</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwals as $j)
                            <tr>
                                <td>{{ $j->tanggal }}</td>
                                <td>{{ $j->waktu }}</td>
                                <td>{{ $j->sampai }}</td>
                                <td align="center">
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h fa-sm fa-fw text-blue-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right mr-4 shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Action:</div>
                                            <a href="#edit-jadwal" type="button" class="dropdown-item"
                                                data-toggle="modal" data-target="#modalEditJadwal" data-id="{{$j->id}}"
                                                data-tanggal="{{$j->tanggal}}" data-waktu="{{$j->waktu}}" data-sampai="{{$j->sampai}}">
                                                Edit Jadwal
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#hapus-jadwal" type="button" class="dropdown-item"
                                                data-toggle="modal" data-target="#modalHapusJadwal" data-id="{{$j->id}}">
                                                Hapus Jadwal
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
                                <input type="hidden" name="nip" value="{{$user->nip}}">
                                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="waktu" class="col-form-label">Waktu</label>
                                <input type="hidden" name="id" id="id" value="{{$user->id}}">
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


<!-- MODAL EDIT JADWAL -->
<div class="modal fade" id="modalEditJadwal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="modalEditJadwalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditJadwalLabel">Buat Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('kurikulum.jadwal.update') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label for="tanggal" class="col-md-3 col-form-label">Tanggal</label>
                            <div class="col-md-9">
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



<!-- Modal Hapus Jadwal -->
<div class="modal fade" id="modalHapusJadwal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalHapusJadwalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHapusJadwalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin untuk menghapus jadwal ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="delete">Ya</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script>
    $('#modalEditJadwal').on('show.bs.modal', function(e){
        let button = $(e.relatedTarget)
        let id = button.data('id')
            tanggal = button.data('tanggal')
            waktu = button.data('waktu')
            sampai = button.data('sampai')

        let modal = $(this)

        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #tanggal').val(tanggal)
        modal.find('.modal-body #waktu').val(waktu)
        modal.find('.modal-body #sampai').val(sampai)
        
    })

    $(document).ready(function () {

        $('#modalHapusJadwal').on('show.bs.modal', function (e) {
            id = $(e.relatedTarget).data('id');
            $('#delete').on('click', function () {
                $('#modalHapusJadwal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: "{{ route('kurikulum.jadwal.destroy') }}",
                    data: {
                        '_token': $('input[name="_token"').val(),
                        'id': id,
                    },
                    success: function (data) {
                        location.reload(false);
                        alert('Jadwal berhasil dihapus');
                    },
                });
            });
        });
    });

</script>
@endsection
