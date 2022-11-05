@extends('layouts.backend.app')

@section('title', 'Club - Edit')

@push('css')
        {{-- toas --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('') }}backend/assets/libs/toastify/toastify.min.css">
    <!-- Sweet Alert css-->
    <link href="{{ asset('') }}backend/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="container-fluid">

    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="{{ $club->background }}" class="profile-wid-img" alt="">
            <div class="overlay-content">
                <div class="text-end p-3">
                    <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                        <input id="profile-foreground-img-file-input" type="file" name="background" class="profile-foreground-img-file-input">
                        <span class="text-danger text-sm background_error"></span>
                        <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                            <i class="ri-image-edit-line align-bottom me-1"></i> Ganti Background
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="{{ $club->logo }}" class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                <input id="profile-img-file-input" name="logo" type="file" class="profile-img-file-input">
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                        
                        <span class="text-danger text-sm logo_error"></span>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#club" role="tab">
                                <i class="fas fa-home"></i> Profile Club
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="club" role="tabpanel">
                            <form id="formUpdateClub" action="{{ route('siteman.clubs.update', $club->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Club</label>
                                            <input type="text" 
                                            class="form-control 
                                            @error('nama')
                                                is-invalid
                                            @enderror" 
                                            id="nama" 
                                            name="nama" 
                                            placeholder="Masukan nama club" 
                                            value="{{ $club->nama }}">
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="slug" class="form-label">Nama Panggilan</label>
                                            <input type="text" 
                                            class="form-control 
                                            @error('slug')
                                                is-invalid
                                            @enderror" 
                                            id="slug" 
                                            name="slug" 
                                            placeholder="Masukan nama panggilan club" 
                                            value="{{ $club->slug }}">
                                            @error('slug')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="tahun_terbentuk" class="form-label">Tahun Terbentuk</label>
                                            <input type="text" 
                                            class="form-control 
                                            @error('tahun_terbentuk')
                                                is-invalid
                                            @enderror" 
                                            data-provider="flatpickr"
                                            id="tahun_terbentuk" 
                                            name="tahun_terbentuk" 
                                            placeholder="Masukan tahun terbentuk club" 
                                            value="{{ $club->tahun_terbentuk }}">
                                            @error('tahun_terbentuk')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="no_tlp" class="form-label">No Tlp</label>
                                            <input type="text" 
                                            class="form-control 
                                            @error('no_tlp')
                                                is-invalid
                                            @enderror" 
                                            id="no_tlp" 
                                            name="no_tlp" 
                                            placeholder="Masukan no tlp club" 
                                            value="{{ $club->no_tlp }}">
                                            @error('no_tlp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" 
                                            class="form-control 
                                            @error('email')
                                                is-invalid
                                            @enderror" 
                                            id="email" 
                                            name="email" 
                                            placeholder="Masukan email desa" 
                                            value="{{ $club->email }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" 
                                            class="form-control 
                                            @error('alamat')
                                                is-invalid
                                            @enderror" 
                                            id="alamat" 
                                            name="alamat" 
                                            placeholder="Masukan no tlp club" 
                                            value="{{ $club->alamat }}">
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="lokasi" class="form-label">Lokasi</label>
                                            <input type="text" 
                                            class="form-control 
                                            @error('lokasi')
                                                is-invalid
                                            @enderror" 
                                            id="lokasi" 
                                            name="lokasi" 
                                            placeholder="Masukan no tlp club" 
                                            value="{{ $club->lokasi }}">
                                            @error('lokasi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="sejarah">Sejarah Club</label>
                                            <textarea class="ckeditor-classic" name="sejarah" id="sejarah">{{ $club->sejarah }}</textarea>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-start">
                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                            <button type="reset" class="btn btn-soft-success">Batal</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

</div>
@endsection

@push('js')
    <!-- ckeditor -->
    <script src="{{ asset('') }}backend/assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
        <!-- init js -->
    <script src="{{ asset('') }}backend/assets/js/pages/form-editor.init.js"></script>
    <!-- Sweet Alerts js -->
    <script src="{{ asset('') }}backend/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    {{-- toast --}}
    <script src="{{ asset('') }}backend/assets/libs/toastify/toastify.js"></script>
        <!-- profile-setting init js -->
    <script src="{{ asset('') }}backend/assets/js/pages/profile-setting.init.js"></script>


    <script>

        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#profile-foreground-img-file-input').on('change', function(){
            var background = $(this)[0].files[0];
            var formData = new FormData();
            formData.append('background', background)
            $.ajax({
                method: 'POST',
                url: `{{ route('siteman.club.update.background', $club->id) }}`,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend:function(){
                    $(document).find('span.text-danger.text-sm').text('');
                },
                success:function(data){
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }else if(data.status == 1){

                        Toastify({
                            text: data.msg,
                            duration: 1000,
                            newWindow: true,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            positionRight: true, // `true` or `false`
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        }).showToast();
                    }else{
                        Toastify({
                            text: data.msg,
                            duration: 1000,
                            newWindow: true,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            positionRight: true, // `true` or `false`
                            backgroundColor: "red",
                        }).showToast();
                    }
                },
                error:function(data){
                    Toastify({
                        text: 'Ada sesuatu yang salah !!!',
                        duration: 2000,
                        newWindow: true,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        positionRight: true, // `true` or `false`
                        backgroundColor: "red",
                    }).showToast();
                }
            })
        });
        $('#profile-img-file-input').on('change', function(){
            var logo = $(this)[0].files[0];
            var formData = new FormData();
            formData.append('logo', logo)
            $.ajax({
                method: 'POST',
                url: `{{ route('siteman.club.update.logo', $club->id) }}`,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend:function(){
                    $(document).find('span.text-danger.text-sm').text('');
                },
                success:function(data){
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }else if(data.status == 1){

                        Toastify({
                            text: data.msg,
                            duration: 1000,
                            newWindow: true,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            positionRight: true, // `true` or `false`
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                        }).showToast();
                    }else{
                        Toastify({
                            text: data.msg,
                            duration: 1000,
                            newWindow: true,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            positionRight: true, // `true` or `false`
                            backgroundColor: "red",
                        }).showToast();
                    }
                },
                error:function(data){
                    Toastify({
                        text: 'Ada sesuatu yang salah !!!',
                        duration: 2000,
                        newWindow: true,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        positionRight: true, // `true` or `false`
                        backgroundColor: "red",
                    }).showToast();
                }
            })
        });
    </script>
@endpush