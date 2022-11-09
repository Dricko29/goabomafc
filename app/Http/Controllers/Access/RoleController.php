<?php

namespace App\Http\Controllers\Access;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Services\RoleService;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:administrator']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RoleDataTable $dataTable)
    {
        return $dataTable->render('backend.access.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.access.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Role\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        Role::create($request->validated() + ['guard_name' => 'web']);
        return redirect()->route('siteman.access.roles.index')->with('toast_success', 'Role berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $rolePermissions = $role->permissions->pluck('name');
        $permissions = Permission::all();
        return view('backend.access.role.show', compact(['role', 'permissions', 'rolePermissions']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('backend.access.role.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Role\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        if ($role->users->count()) {
            return redirect()->back()->with('toast_error', 'Role ini tidak dapat diubah!');
        } else {
            $role->update($request->validated() + ['guard_name' => 'web']);
            return redirect()->route('siteman.access.roles.index')->with('toast_success', 'Role berhasil diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->users->count()){
            return redirect()->back()->with('toast_error', 'Role ini tidak dapat dihapus!');
        }else{        
            $role->delete();
            return redirect()->route('siteman.access.roles.index')->with('toast_success', 'Role berhasil dihapus!');
        }
    }

    public function bulkDelete(Request $request, RoleService $service)
    {
        $role = $service->bulkDeleteRole($request->id);
        $role->delete();
        return response()->json(['code' => 1, 'msg' => 'Role berhasil dihapus!']);
        
    }

    public function syncPermissions(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);
        return redirect()->back()->with('toast_success', 'Permissions berhasil diterapkan!');
    }

    public function assignUserRole(Role $role)
    {
        $users = User::with('roles')->get();
        return view('backend.access.role.modal', compact(['role', 'users']));
    }

    public function assignUser(Role $role, User $user)
    {
        if ($user->hasRole($role->name)) {
            return redirect()->back()->with('toast_error', 'User ini sudah menjadi ' . $role->name . ' !');
        }
        $user->assignRole($role->name);
        return redirect()->back()->with('toast_success', 'User berhasil ditambahkan pada role ini!');
    }

    public function removeUserRole(Role $role, User $user)
    {
        if ($user->id == auth()->user()->id) {
            return redirect()->back()->with('toast_error', 'Anda adalah seorang administrator!');
        }
        $user->removeRole($role->name);
        return redirect()->back()->with('toast_success', 'User berhasil dihapus pada role ini!');
    }

}