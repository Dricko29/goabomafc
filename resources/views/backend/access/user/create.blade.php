@extends('layouts.backend.app')

@section('title', 'Tambah - User')

@push('css')

    <link href="{{ asset('') }}backend/assets/cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Users</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('siteman.access.users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">Tambah User</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div>
                                <a href="{{ route('siteman.access.users.index') }}" class="btn btn-success"><i class="ri-arrow-left-line align-bottom me-1"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <p class="text-muted">Silahkan inputkan data user dengan benar.</p>
                    <form action="{{ route('siteman.access.users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="js-example-basic-multiple @error('role')
                                        is-invalid
                                    @enderror" name="role[]" multiple="multiple">
                                        @foreach ($roles as $role) 
                                            <option value="{{ $role->name }}"{{ (collect(old('role'))->contains($role->name)) ? 'selected':'' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama User</label>
                                    <input type="text" class="form-control @error('name')
                                        is-invalid
                                    @enderror" name="name" value="{{ old('name') }}" placeholder="Masukan nama user" id="name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email')
                                        is-invalid
                                    @enderror" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" id="email">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div class="text-start">
                                    <button type="submit" class="btn btn-primary"><i class="ri-save-line align-bottom me-1"></i>Simpan</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!--end row-->

</div>

@endsection

@push('js')
    <!--select2 cdn-->
    <script src="{{ asset('') }}backend/assets/cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $(".js-example-basic-multiple").select2();
        })
    </script>
@endpush