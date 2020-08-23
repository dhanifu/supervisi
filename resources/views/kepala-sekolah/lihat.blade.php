@extends('layouts.app')

@section('title', 'Kepala Sekolah - Lihat Data')

@section('active-kepsek-lihat', 'active')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Lihat Hasil RPP</h1>
</div>


<!-- Content Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4 shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data RPP</h6>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width: 10px; text-align: center">No</th>
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
                                <td style="text-align: center">{{ $loop->iteration }}</td>
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
                                    @if( $r->status == 1 )
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
