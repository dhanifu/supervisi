@extends('layouts.app')

@section('title', 'Kurikulum - Persetujuan')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">RPP Yang Belum Dinilai</h1>
</div>

 <div class="row">
     <div class="col-lg-12">
        <div class="card mb-4 shadow h-100">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data RPP yang belum dinilai
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $rpp as $r )
                            <tr>
                                <td>{{ $r->name }}</td>
                                <td>{{ $r->nama_rpp }}</td>
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