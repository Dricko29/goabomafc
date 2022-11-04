                    <div class="modal-content border-0">
                        <div class="modal-header p-3 ps-4 bg-soft-success">
                            <h5 class="modal-title" id="inviteMembersModalLabel">User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="search-box mb-3">
                                <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                            <div class="mx-n4 px-4" data-simplebar style="max-height: 225px;">
                                <div id="addMember" class="vstack gap-3">
                                    <input id="roleId" type="hidden" value="{{ $role->id }}">
                                    @foreach ($users as $item)
                                    <form action="{{ route('siteman.access.roles.assign.users',[$role->id, $item->id]) }}" method="POST">
                                        @csrf
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                <img src="{{ asset($item->profile_photo_url) }}" alt="" class="img-fluid rounded-circle">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h5 class="fs-13 mb-0"><a href="javascript:void(0);" class="text-body d-block">{{ $item->name }}</a></h5>
                                                @foreach ($item->roles as $r)
                                                    <p class="d-inline text-muted">{{ $r->name }}</p>
                                                @endforeach
                                            </div>
                                            <div class="flex-shrink-0">
                                                <button type="submit" data-id="{{ $item->id }}" class="btn btn-danger btn-sm action">Tambah</button>
                                            </div>
                                        </div>
                                        <!-- end member item -->
                                    </form>
                                        
                                    @endforeach
                                </div>
                                <!-- end list -->
                            </div>
                        </div>
                    </div>
                    <!-- end modal-content -->