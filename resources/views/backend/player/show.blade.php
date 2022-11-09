@extends('layouts.backend.app')

@section('title', 'Detail - Player')

@push('css')
    <!-- Filepond css -->
    <link rel="stylesheet" href="{{ asset('') }}backend/assets/libs/filepond/filepond.min.css" type="text/css" />
    <link rel="stylesheet" href="{{ asset('') }}backend/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">
@endpush

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Player</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('siteman.players.index') }}">Players</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">Detail Player</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div>
                                <a href="{{ route('siteman.players.index') }}" class="btn btn-success"><i class="ri-arrow-left-line align-bottom me-1"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block">
                        @if ($player->foto_path)
                        <img src="{{ asset($player->foto_path) }}" alt="" class="avatar-xl rounded-circle img-thumbnail">
                        <span class="contact-active position-absolute rounded-circle bg-success"><span class="visually-hidden"></span>
                        @else
                        <img src="{{ asset('backend/assets/images/club/player/default.jpg') }}" alt="" class="avatar-xl rounded-circle img-thumbnail">
                        <span class="contact-active position-absolute rounded-circle bg-success"><span class="visually-hidden"></span>
                        @endif
                    </div>
                    <h5 class="mt-4 mb-1">{{ $player->nama }}</h5>
                    <p class="text-muted">{{ $player->position->nama }}</p>

                    <ul class="list-inline mb-0">
                        <li class="list-inline-item avatar-xs">
                            <a href="javascript:void(0);" class="avatar-title bg-soft-success text-success fs-15 rounded">
                                <i class="ri-phone-line"></i>
                            </a>
                        </li>
                        <li class="list-inline-item avatar-xs">
                            <a href="javascript:void(0);" class="avatar-title bg-soft-danger text-danger fs-15 rounded">
                                <i class="ri-mail-line"></i>
                            </a>
                        </li>
                        <li class="list-inline-item avatar-xs">
                            <a href="javascript:void(0);" class="avatar-title bg-soft-warning text-warning fs-15 rounded">
                                <i class="ri-question-answer-line"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Personal Information</h6>
                    
                    <div class="table-responsive table-card">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td class="fw-medium" scope="row">Nama Player</td>
                                    <td>: {{ $player->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium" scope="row">Position</td>
                                    <td>: {{ $player->position->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium" scope="row">Nomor Punggung</td>
                                    <td>: <span class="badge bg-primary">{{ $player->no_pg }}</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium" scope="row">Tgl Lahir</td>
                                    <td>: {{ $player->tgl_lahir }} ({{ $player->umur }} Tahun)</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium" scope="row">Nomor Tlp</td>
                                    <td>: {{ $player->no_tlp }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>

    </div>
@endsection

@push('js')
    <!-- filepond js -->
    <script src="{{ asset('') }}backend/assets/libs/filepond/filepond.min.js"></script>
    <script src="{{ asset('') }}backend/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
    <script src="{{ asset('') }}backend/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
    <script src="{{ asset('') }}backend/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
    <script src="{{ asset('') }}backend/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js"></script>

    
    <script>
        $(document).ready(function () {
            $(".form-select").select2();
        })
        FilePond.registerPlugin(
            FilePondPluginFileEncode,
            FilePondPluginFileValidateSize,
            FilePondPluginImageExifOrientation,
            FilePondPluginImagePreview
        );
        FilePond.create(document.querySelector(".filepond-input-circle"), {
            labelIdle:
                'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',
            imagePreviewHeight: 170,
            imageCropAspectRatio: "1:1",
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            stylePanelLayout: "compact circle",
            styleLoadIndicatorPosition: "center bottom",
            styleProgressIndicatorPosition: "right bottom",
            styleButtonRemoveItemPosition: "left bottom",
            styleButtonProcessItemPosition: "right bottom",
        });
        FilePond.setOptions({
            server: {
                process: '/siteman/players/upload',
                revert: '/siteman/players/delete',
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            },
        });
    </script>
@endpush