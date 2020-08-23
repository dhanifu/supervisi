@extends('layouts.app')

@section('title', 'Admin - Nambah User')

@section('active-admin-supervisor', 'active')
@section('show-admin-supervisor', 'show')
@section('active-admin-nambah', 'active')

@section('content')
    

    <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
    <p class="mb-4">Tambah user untuk dipilih oleh Kurikulum menjadi Supervisor</p>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4 shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form tambah user
                        <button class="btn btn-sm btn-primary shadow-sm float-right" onclick="document.location.href='{{route('admin.supervisor.index')}}'">
                            <i class="fas fa-chevron-left text-white-50"></i> Back
                        </button>
                    </h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.supervisor.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="nip" class="col-md-4 col-form-label text-md-right">{{ __('Nip') }}</label>

                            <div class="col-md-6">
                                <input id="nip" type="number" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}" 
                                required autofocus maxlength="18">

                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="text" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary shadow">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection