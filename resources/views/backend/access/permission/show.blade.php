@extends('layouts.backend.app')

@section('title', 'Permission - Detail')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Permission</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siteman.access.permissions.index') }}">Permissions</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xxl-3">
                <div class="card mb-3">
                    <div class="card-header align-items-center d-flex bg-primary">
                        <h4 class="card-title mb-0 flex-grow-1 text-light">Detail Permission</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <a href="{{ route('siteman.access.permissions.index') }}" class="btn btn-sm btn-light"><i class="ri-arrow-left-line align-bottom me-1"></i>Kembali</a>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="table-card">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td class="fw-medium">Nama Permission</td>
                                        <td>{{ $permission->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Tanggal Dibuat</td>
                                        <td>{{ $permission->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Jumlah User</td>
                                        <td><span class="badge badge-soft-danger">{{ $permission->users()->count() }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Jumlah Role</td>
                                        <td><span class="badge badge-soft-secondary">{{ $permission->roles()->count() }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
        </div>
        <!--end row-->
    </div>
@endsection

@push('js')

@endpush