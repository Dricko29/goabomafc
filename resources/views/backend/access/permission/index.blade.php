@extends('layouts.backend.app')

@section('title', 'Permissions')

@push('css')
    <!-- Sweet Alert css-->
    <link href="{{ asset('') }}backend/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!--datatable css-->
    <link rel="stylesheet" href="{{ asset('') }}backend/assets/cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css" />
@endpush

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom-dashed">
                        <div class="row g-4 align-items-center">
                            <div class="col-sm">
                                <div>
                                    <h5 class="card-title mb-0">Permissions</h5>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div>
                                    <button id="bulk_delete" class="btn btn-soft-danger"><i class="ri-delete-bin-2-line"></i></button>
                                    <a href="{{ route('siteman.access.permissions.create') }}" class="btn btn-success"><i class="ri-add-line align-bottom me-1"></i> Tambah Permission</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $dataTable->table() !!}
                    </div>
                </div>
            </div><!--end col-->
    </div>
    <!-- container-fluid -->
@endsection

@push('js')

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('') }}backend/assets/cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('') }}backend/assets/libs/sweetalert2/sweetalert2.min.js"></script>
{!! $dataTable->scripts() !!}

<script>

    // delete role
    $(document).on('click', 'button.confirm-delete', function () {
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
                        icon: 'error',
                        confirmButtonClass: 'btn btn-primary mt-2',
                        buttonsStyling: !1,
                });
            }
        });
    });

    // multiple delete permissions
    $(document).on('click','input[name="check_all"]', function(){
        if(this.checked){
            $('input[name="permission_bulk"]').each(function(){
                this.checked = true;
            })
        }else{
            $('input[name="permission_bulk"]').each(function(){
                this.checked = false;
            })
        }
    });

    $(document).on('change','input[name="permission_bulk"]', function(){
        console.log($('input[name="permission_bulk"]').length);
        if ($('input[name="permission_bulk"]').length == $('input[name="permission_bulk"]:checked').length) {
            $('input[name="check_all"]').prop('checked', true);
        } else {
            $('input[name="check_all"]').prop('checked', false);
        }
    });

    $('#bulk_delete').on('click', function(){
        var id = [];
        Swal.fire({
            title: 'Apakah anda yakin ?',
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
                $('#bulkId:checked').each(function(){
                    id.push($(this).val());
                });
                if(id.length > 0)
                {
                    $.ajax({
                        url:`{{ route('siteman.access.permissions.bulk-delete') }}`,
                        method:"post",
                        data:{id:id},
                        headers:{
                            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data)
                        {
                            if (data.code == 0) {
                                Swal.fire({
                                        title: data.msg,
                                        icon: 'error',
                                        confirmButtonClass: 'btn btn-danger mt-2',
                                        buttonsStyling: !1,
                                });
                                window.LaravelDataTables["permission-table"].ajax.reload();
                                $('input[name="check_all"]').prop('checked', false);
                            } else {
                                Swal.fire({
                                        title: data.msg,
                                        icon: 'success',
                                        confirmButtonClass: 'btn btn-primary mt-2',
                                        buttonsStyling: !1,
                                });
                                window.LaravelDataTables["permission-table"].ajax.reload();
                                $('input[name="check_all"]').prop('checked', false);
                            }
                        }
                    });
                }
                else
                {
                    Swal.fire({
                        title: 'Pilih data terlebih dahulu',
                        icon: 'error',
                        confirmButtonClass: 'btn btn-danger mt-2',
                        buttonsStyling: !1,
                    });
                    $('input[name="check_all"]').prop('checked', false);
                }
            } else{
                Swal.fire({
                        title: 'Dibatalkan',
                        icon: 'error',
                        confirmButtonClass: 'btn btn-primary mt-2',
                        buttonsStyling: !1,
                });
                $('input[name="check_all"]').prop('checked', false);
            }
        });
    });
</script>
@endpush