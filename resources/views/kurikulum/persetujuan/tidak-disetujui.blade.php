@extends('layouts.app')

@section('title', 'Kurikulum - Persetujuan')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">RPP Yang Tidak Disetujui</h1>
</div>

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
        <div class="card mb-4 shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data RPP yang tidak disetujui
                <button class="btn btn-sm btn-primary shadow-sm float-right" onclick="document.location.href='{{route('kurikulum.persetujuan.index')}}'">
                    <i class="fas fa-chevron-left text-white-50"></i> Back
                </button>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nama Guru</th>
                                <th>Nama RPP</th>
                                <th>Nilai</th>
                                <th>Status</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $rpp as $r )
                            <tr>
                                <td>{{ $r->name }}</td>
                                <td>{{ $r->nama_rpp }}</td>
                                <td>{{ $r->nilai }}</td>
                                <td align="center">
                                    <span class="text-danger" title="Disetujui">
                                        <i class="fas fa-lg fa-times-circle"></i>
                                    </span>
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
                                            <a href="#edit-status" type="button" class="dropdown-item" data-toggle="modal"
                                                    data-target="#modalEditPersetujuan" data-id="{{$r->id}}" data-status="{{$r->status}}">
                                                Edit Status
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{ asset('documents/rpp/'.$r->rpp) }}"
                                                target="_blank">Lihat file</a>
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

 <!-- Modal Edit Persetujuan -->
<div class="modal fade" id="modalEditPersetujuan" data-backdrop="static" data-keyboard="false" tabindex="-1"
aria-labelledby="modalEditPersetujuanLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalEditPersetujuanLabel">Persetujuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('kurikulum.persetujuan.edit-status') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="rpp_id" id="rpp_id">
                            <center>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-success btn-lg btn-circle" style="width: 70px">
                                    <input type="radio" name="status" id="setuju" value="1"> 
                                    <i class="fas"></i>
                                    <p id="p" style="font-size: 12px; margin-top: 13px"></p>
                                </label>
                                <div style="margin-left: 50px"></div>
                                <label class="btn btn-danger btn-lg btn-circle" style="width: 70px">
                                    <input type="radio" name="status" id="tidaksetuju" value="0"> 
                                    <i class="fas"></i>
                                    <p id="p" style="font-size: 12px; margin-top: 13px"></p>
                                </label>
                            </div>
                            </center>
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
    
@endsection

@section('js')
    <script>
        $('#modalEditPersetujuan').on('show.bs.modal', function (e) {
        let button = $(e.relatedTarget)
        let rpp_id = button.data('id')
            status = button.data('status')

        let modal = $(this)

        modal.find('.modal-body #rpp_id').val(rpp_id)

        if (status == 1) {
            modal.find('.btn-group .btn-success').addClass('active')
            modal.find('.btn-group .btn-danger').removeClass('active')
            modal.find('.btn-success .fas').addClass('fa-check')
            modal.find('.btn-danger #p').text('Tidak Setujui')
            modal.find('.btn-group #setuju').prop('checked', true)
        }else if(status == 0){
            modal.find('.btn-group .btn-success').removeClass('active')
            modal.find('.btn-group .btn-danger').addClass('active')
            modal.find('.btn-danger .fas').addClass('fa-times')
            modal.find('.btn-success #p').text('Setujui')
            modal.find('.btn-group #tidaksetuju').prop('checked', true)
        }

        $('.btn-success').click(function(){
            modal.find('.btn-success .fas').addClass('fa-check');
            modal.find('.btn-danger .fas').removeClass('fa-times')
            modal.find('.btn-success #p').text('')
            modal.find('.btn-danger #p').text('Tidak Setujui')
        })
        $('.btn-danger').click(function(){
            modal.find('.btn-danger .fas').addClass('fa-times');
            modal.find('.btn-success .fas').removeClass('fa-check')
            modal.find('.btn-danger #p').text('')
            modal.find('.btn-success #p').text('Setujui')
        })
    })
    </script>
@endsection