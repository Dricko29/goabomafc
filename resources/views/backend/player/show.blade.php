@extends('layouts.backend.app')

@section('title', 'Detail - User')

@push('css')
    <!-- Sweet Alert css-->
    <link href="{{ asset('') }}backend/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('') }}backend/assets/cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">User</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siteman.access.users.index') }}">User</a></li>
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
                        <h4 class="card-title mb-0 flex-grow-1 text-light">Detail User</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <a href="{{ route('siteman.access.users.index') }}" class="btn btn-sm btn-light"><i class="ri-arrow-left-line align-bottom me-1"></i>Kembali</a>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="flex-shrink-0 avatar-md mx-auto">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ asset($user->profile_photo_url) }}" alt="" height="50" />
                            </div>
                        </div>
                        <div class="my-4 text-center">
                            <h5 class="mb-1">{{ $user->name }}</h5>
                            {{-- <p class="text-muted">Since 1987</p> --}}
                        </div>
                        <div class="table-card">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td class="fw-medium">Nama User</td>
                                        <td>:</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Email</td>
                                        <td>:</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Tanggal Terdaftar</td>
                                        <td>:</td>
                                        <td>{{ $user->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex mb-3">
                            <h6 class="card-title mb-0 flex-grow-1">Role</h6>
                        </div>
                        <form action="{{ route('siteman.access.users.sync.roles', $user->id) }}" method="POST">      
                            @csrf                
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="js-example-basic-multiple @error('role')
                                    is-invalid
                                @enderror" name="role[]" multiple="multiple">
                                    @foreach ($roles as $role) 
                                        <option value="{{ $role->name }}" {{ in_array($role->name, $userRoles->toArray()) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--end card-->
            </div>
            <!---end col-->
            <div class="col-xxl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted">
                            <h6 class="mb-3 fw-semibold text-uppercase">Permissions</h6>
                            
                            <form id="formGivePermission" action="{{ route('siteman.access.users.sync.permissions', $user->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                @forelse ($permissions as $item)    
                                    <div class="col-lg-3 col-md-6">    
                                        <div id="form-check" class="form-check form-check-danger mb-3">
                                            <input id="permission" class="form-check-input" type="checkbox" name="permissions[]" value="{{ $item->name }}" id="formCheck{{ $item->id }}" {{ in_array($item->name, $userPermissions->toArray()) ? 'checked' : '' }}>
                                            
                                            <label class="form-check-label" for="formCheck{{ $item->id }}">
                                                {{ $item->name }}
                                            </label>
                                        </div>    
                                    </div>
                                    <!--end col-->
                                @empty
                                <div>
                                    Tidak Ada Permissions
                                </div>
                                @endforelse
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-danger">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->

    </div>
@endsection

@push('js')
    
    <!-- Sweet Alerts js -->
    <script src="{{ asset('') }}backend/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!--select2 cdn-->
    <script src="{{ asset('') }}backend/assets/cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".js-example-basic-multiple").select2();
        })
        // konfirmasi penghapusan
        $(document).on('click', 'button.confirm-delete-user-role', function () {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan menghapus data ini!",
                icon: 'warning',
                showCancelButton: !0,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Tidak, Batal!',
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-danger w-xs mt-2',
                buttonsStyling: !1,
                showCloseButton: !0,
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).parent('form').trigger('submit')
                } else{
                    Swal.fire({
                        title: 'Dibatalkan',
                        text: 'File anda aman :)',
                        icon: 'error',
                        confirmButtonClass: 'btn btn-primary mt-2',
                        buttonsStyling: !1,
                    });
                }
            });
        });
    </script>
@endpush