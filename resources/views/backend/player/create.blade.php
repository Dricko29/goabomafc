@extends('layouts.backend.app')

@section('title', 'Tambah - Player')

@push('css')

    <link href="{{ asset('') }}backend/assets/cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Players</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('siteman.players.index') }}">PLayers</a></li>
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
                                <h5 class="card-title mb-0">Tambah Player</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div>
                                <a href="{{ route('siteman.players.index') }}" class="btn btn-success"><i class="ri-arrow-left-line align-bottom me-1"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <p class="text-muted">Silahkan inputkan data user dengan benar.</p>
                    <form action="{{ route('siteman.players.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Position</label>
                                    <select class="form-control select2 @error('position_id')
                                        is-invalid
                                    @enderror" 
                                    name="position_id" 
                                    id="position_id">
                                        <option value="" disabled>Position</option>
                                        @foreach ($positions as $position)
                                        <option value="{{ $position->id }}"{{ (collect(old('position_id'))->contains($position->id)) ? 'selected':'' }}>{{ $position->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Player</label>
                                    <input type="text" class="form-control @error('nama')
                                        is-invalid
                                    @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukan nama" id="nama">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_pg" class="form-label">Nomor Punggung</label>
                                    <input type="text" class="form-control @error('no_pg')
                                        is-invalid
                                    @enderror" name="no_pg" value="{{ old('no_pg') }}" placeholder="Masukan no punggung" id="no_pg">
                                    @error('no_pg')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_tlp" class="form-label">Nomor Tlp</label>
                                    <input type="text" class="form-control @error('no_tlp')
                                        is-invalid
                                    @enderror" name="no_tlp" value="{{ old('no_tlp') }}" placeholder="Masukan no telpon" id="no_tlp">
                                    @error('no_tlp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tgl_lahir" class="form-label">Tgl Lahir</label>
                                    <input type="text" class="form-control @error('tgl_lahir')
                                        is-invalid
                                    @enderror" name="tgl_lahir"
                                    data-provider="flatpickr" 
                                    value="{{ old('tgl_lahir') }}" 
                                    placeholder="Masukan tgl lahir" 
                                    id="tgl_lahir">
                                    @error('tgl_lahir')
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
            $(".select2").select2();
        })
    </script>
@endpush