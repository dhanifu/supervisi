@extends('layouts.app')

@section('title', 'Kurikulum - Persetujuan')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Persetujuan</h1>
    <span class="btn bg-primary btn-icon-split" style="cursor: default">
        <span class="text text-white shadow-sm"> Jumlah RPP</span>
        <span class="icon text-white-50">
            {{ $total }}
        </span>
    </span>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Total Data Disetujui -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <a href="{{ route('kurikulum.persetujuan.disetujui') }}" style="text-decoration: none">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Disetujui <span class="text-primary"> &rarr;</span></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $disetujui }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Total data yang tidak disetujui -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <a href="{{ route('kurikulum.persetujuan.tidakdisetujui') }}" style="text-decoration: none">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Tidak Disetujui <span class="text-primary"> &rarr;</span></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tak_disetujui }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Total data yang belum disetujui -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Belum Disetujui</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $belum_disetujui }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-minus-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total data yang belum dinilai & disetujui -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <a href="{{ route('kurikulum.persetujuan.belumdinilai') }}" style="text-decoration: none">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Belum Dinilai <span class="text-primary"> &rarr;</span></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $belum_dinilai }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-minus-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>

<!-- Content Row -->

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
            <h6 class="m-0 font-weight-bold text-primary">Data RPP yang belum disetujui</h6>
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
                            <td>
                                <span title="{{$r->nama_rpp}}">
                                    @if ( strlen($r->nama_rpp) > 30 )
                                    {{ substr($r->nama_rpp, 0, 30) }}....
                                    @else
                                    {{ $r->nama_rpp }}
                                    @endif
                                </span>
                            </td>
                            <td style="width: 60px">{{ $r->nilai }}</td>
                            <td align="center">
                                @if ( $r->status == 'belum' )
                                <button type="submit" class="btn btn-sm btn-circle btn-success"
                                    style="width: 25px; height: 25px" title="Setujui" data-toggle="modal"
                                    data-target="#modalSetujui" data-id="{{$r->id}}">
                                    <i class="fas fa-lg fa-check"></i>
                                </button>&nbsp;&nbsp;
                                <button type="submit" class="btn btn-sm py-0 btn-circle btn-danger"
                                    style="width: 25px; height: 25px" title="Tidak Setujui" data-toggle="modal"
                                    data-target="#modalTidakSetujui" data-id="{{$r->id}}">
                                    <i class="fas fa-lg fa-times"></i>
                                </button>
                                @elseif( $r->status == 1 )
                                <span class="text-success"><i class="fas fa-lg fa-check-circle"
                                        title="Disetujui"></i></span>
                                @elseif( $r->status == 0 )
                                <span class="text-danger"><i class="fas fa-lg fa-times-circle"
                                        title="Tidak Disetujui"></i></span>
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
                                        @if($r->status != 'belum')
                                            <a href="#edit-status" type="button" class="dropdown-item" data-toggle="modal"
                                                    data-target="#modalEditPersetujuan" data-id="{{$r->id}}" data-status="{{$r->status}}">
                                                Edit Status
                                            </a>
                                        @endif
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


<!-- Modal Setuju -->
<div class="modal fade" id="modalSetujui" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalSetujuiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSetujuiLabel">Persetujuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Setujui RPP ini?
            </div>
            <div class="modal-footer">
                <form action="{{ route('kurikulum.persetujuan.setujui') }}" method="POST">
                    @csrf
                    <input type="hidden" name="rpp_id" id="rpp_id">
                    <input type="hidden" name="status" value="1">
                    <button type="submit" class="btn btn-primary">Setujui</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tidak Setuju -->
<div class="modal fade" id="modalTidakSetujui" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="modalTidakSetujuiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTidakSetujuiLabel">Persetujuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tidak Menyetujui RPP ini?
            </div>
            <div class="modal-footer">
                <form action="{{route('kurikulum.persetujuan.tidaksetujui')}}" method="POST">
                    @csrf
                    <input type="hidden" name="rpp_id" id="rpp_id">
                    <input type="hidden" name="status" value="0">
                    <button type="submit" class="btn btn-primary">Ya, saya tidak menyetujui</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    $('#modalSetujui').on('show.bs.modal', function (e) {
        let button = $(e.relatedTarget)
        let rpp_id = button.data('id')

        let modal = $(this)

        modal.find('.modal-footer #rpp_id').val(rpp_id)
    })

    $('#modalTidakSetujui').on('show.bs.modal', function (e) {
        let button = $(e.relatedTarget)
        let rpp_id = button.data('id')

        let modal = $(this)

        modal.find('.modal-footer #rpp_id').val(rpp_id)
    })

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
