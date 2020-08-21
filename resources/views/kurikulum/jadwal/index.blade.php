@extends('layouts.app')

@section('title', 'Kurikulum - Jadwal')

@section('content')
    
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Persetujuan</h1>
    <button type="button" class="mt-2 btn btn-sm btn-primary shadow-sm shadow h-100"><i
            class="fas fa-calendar-plus text-white-50"></i> &nbsp;Buat Jadwal</button>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Disetujui</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $disetujui }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tidak Disetujui</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tak_disetujui }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
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
                                <td>{{ $r->nilai }}</td>
                                <td align="center">
                                    <span class="text-success" title="Setujui">
                                        <i class="fas fa-lg fa-check-circle"></i>
                                    </span> &nbsp;<b>/</b>&nbsp;
                                    <span class="text-danger" title="Tidak Setujui">
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

@endsection