@extends('layouts.app')

@section('title', 'GURU | Upload RPP')

@section('content')
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
                <h6 class="m-0 font-weight-bold text-primary">Progress Small Utility</h6>
            </div>
            <div class="card-body">


                <form action="{{ route('guru.rpp.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_rpp">Namai RPP anda</label>
                        <input type="text" name="nama_rpp" id="nama_rpp"
                            class="form-control @error('nama_rpp') is-invalid @enderror" value="{{ old('nama_rpp') }}"
                            placeholder="Namai RPPnya">

                        @error('nama_rpp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rpp">Pilih File RPP</label>
                        <input type="file" name="rpp" id="rpp" class="form-control @error('rpp') is-invalid @enderror"
                            value="{{ old('rpp') }}">

                        @error('rpp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <center>
                        <button class="btn btn-primary">Submit</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- TABLE --}}


<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data RPP</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nama RPP</th>
                            <th>Dinilai Oleh</th>
                            <th>Nilai</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($rpps_join))
                            @foreach ($rpps_join as $rpp)
                            <tr>
                                <td>{{ $rpp->nama_rpp }}</td>
                                <td>{{ $rpp->name }}</td>
                                <td>{{ $rpp->nilai }}</td>
                                <td>
                                    @if( $rpp->status == 1)
                                        <span class="badge badge-primary">Disetujui</span>
                                    @elseif( $rpp->status == '' )
                                        <span class="badge badge-warning">Belum disetujui</span>
                                    @else
                                        <span class="badge badge-danger">Tidak disetujui</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @else
                            @foreach ($rpps as $rpp)
                                <td>{{ $rpp->nama_rpp }}</td>
                                <td><i>Belum Dinilai</i></td>
                                <td><i>Belum Dinilai</i></td>
                                <td>
                                    @if( $rpp->status == 1)
                                        <span class="badge badge-primary">Disetujui</span>
                                    @elseif( $rpp->status == '' )
                                        <span class="badge badge-warning">Belum disetujui</span>
                                    @else
                                        <span class="badge badge-danger">Tidak disetujui</span>
                                    @endif    
                                </td>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
