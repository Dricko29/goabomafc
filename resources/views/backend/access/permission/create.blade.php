@extends('layouts.backend.app')

@section('title', 'Permissions - Tambah')

@push('css')

@endpush

@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Permissions</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('siteman.access.permissions.index') }}">Permissions</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xxl-6">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">Tambah Permission</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div>
                                <a href="{{ route('siteman.access.permissions.index') }}" class="btn btn-success"><i class="ri-arrow-left-line align-bottom me-1"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('siteman.access.permissions.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Permission</label>
                                    <input type="text" class="form-control @error('name')
                                        is-invalid
                                    @enderror" name="name" value="{{ old('name') }}" placeholder="Masukan nama permission" id="name">
                                    @error('name')
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
    </div> <!-- end col -->

</div>
@endsection

@push('js')

@endpush