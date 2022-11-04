@extends('layouts.backend.app')

@section('title', 'Roles - Detail')

@push('css')
    <!-- Sweet Alert css-->
    <link href="{{ asset('') }}assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Roles</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siteman.access.roles.index') }}">Roles</a></li>
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
                        <h4 class="card-title mb-0 flex-grow-1 text-light">Detail Role</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <a href="{{ route('siteman.access.roles.index') }}" class="btn btn-sm btn-light"><i class="ri-arrow-left-line align-bottom me-1"></i>Kembali</a>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="table-card">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td class="fw-medium">Nama Role</td>
                                        <td>{{ $role->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Tanggal Dibuat</td>
                                        <td>{{ $role->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Jumlah User</td>
                                        <td><span class="badge badge-soft-danger">{{ $role->users()->count() }}</span></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium">Jumlah Permissions</td>
                                        <td><span class="badge badge-soft-secondary">{{ $role->permissions()->count() }}</span></td>
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
                            <h6 class="card-title mb-0 flex-grow-1">User</h6>
                            <div class="flex-shrink-0">
                                <button id="btnAddMember" type="button" class="btn btn-primary btn-sm"><i class="ri-share-line me-1 align-bottom"></i> Tambah</button>
                            </div>
                        </div>
                        <ul class="list-unstyled vstack gap-3 mb-0">
                            @foreach ($role->users as $item)         
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset($item->profile_photo_url) }}" alt="" class="avatar-xs rounded-circle">
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h6 class="mb-1"><a href="pages-profile.html">{{ $item->name }}</a></h6>
                                        <p class="text-muted mb-0">{{ $item->email }}</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown">
                                            <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>Profile</a></li>
                                                <li>
                                                    <form action="{{ route('siteman.access.roles.remove.user', [$role->id, $item->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="dropdown-item confirm-delete-user-role"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Hapus</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
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
                            
                            <form id="formGivePermission" action="{{ route('siteman.access.roles.sync.permissions', $role->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                @forelse ($permissions as $item)    
                                    <div class="col-lg-3 col-md-6">    
                                        <div id="form-check" class="form-check form-check-danger mb-3">
                                            <input id="permission" class="form-check-input" type="checkbox" name="permissions[]" value="{{ $item->name }}" id="formCheck{{ $item->id }}" {{ in_array($item->name, $rolePermissions->toArray()) ? 'checked' : '' }}>
                                            
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

        <div class="modal fade" id="inviteMembersModal" tabindex="-1" aria-labelledby="inviteMembersModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">

            </div>
            <!-- modal-dialog -->
        </div>
        <!-- end modal -->

    </div>

@endsection

@push('js')

        <!-- Sweet Alerts js -->
    <script src="{{ asset('') }}assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <script>
        var modal = new bootstrap.Modal($('#inviteMembersModal'));
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#btnAddMember').on('click', function(){
            $.ajax({
                url:`{{ route('siteman.access.roles.users.role', $role->id) }}`,
                method:'GET',
                success:function(response){
                    $('#inviteMembersModal').find('.modal-dialog').html(response);
                    modal.show()
                }
            })
        });

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