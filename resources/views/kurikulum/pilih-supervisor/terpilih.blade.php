@extends('layouts.app')

@section('title', 'Kurikulum - Pilih Supervisor')

@section('active-kurikulum-pilih', 'active')
@section('show-kurikulum-pilih', 'show')
@section('active-kurikulum-terpilih', 'active')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Supervisor</h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Supervisor</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Email</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $users as $u )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->nip }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td align="center">
                                        <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-h fa-sm fa-fw text-blue-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right mr-4 shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Action:</div>
                                                <a href="#cabut-role" type="button" class="dropdown-item" data-toggle="modal"
                                                        data-target="#modalCabutRole" data-id="{{$u->id}}" data-nip="{{$u->nip}}">
                                                    Cabut Role
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


<!-- Modal Cabut Role Supervisor -->
<div class="modal fade" id="modalCabutRole" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalCabutRoleLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCabutRoleLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Anda yakin untuk mencabut role Supervisor user ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="cabut">Ya</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
    $(document).ready(function(){
        $('#modalCabutRole').on('show.bs.modal', function(e){
            id = $(e.relatedTarget).data('id');
            nip = $(e.relatedTarget).data('nip');
            $('#cabut').on('click', function(){
                $('#modalCabutRole').modal('hide');
                $.ajax({
                    type: "GET",
                    url: "{{ route('kurikulum.pilih.cabut') }}",
                    data: {
                        '_token' : $('input[name="_token"').val(),
                        'id' : id,
                        'nip' : nip,
                    },
                    success: function (data) {
                        location.reload(false)
                        alert('User dengan NIP: '+nip+' berhasil dicabut dari role Supervisor')
                    },
                });
            }); 
        });
    });
    </script>
@endsection