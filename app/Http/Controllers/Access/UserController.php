<?php

namespace App\Http\Controllers\Access;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
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
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('backend.access.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.access.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\User\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated() + ['password' => Hash::make('password')]);
        $user->syncRoles($request->role);
        return redirect()->route('siteman.access.users.index')->with('toast_success', 'User berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        abort_if($user->id == auth()->user()->id, 403);
        $roles = Role::all();
        $userRoles = $user->roles->pluck('name');
        $userPermissions = $user->permissions->pluck('name');
        $permissions = Permission::all();
        return view('backend.access.user.show', compact('user', 'permissions', 'userPermissions', 'roles', 'userRoles'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $userRole = $user->roles->pluck('name');
        $roles = Role::all();
        return view('backend.access.user.edit',compact('user','roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\User\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        abort_if($user->id == auth()->user()->id, 403);
        $user->update($request->validated());
        $user->syncRoles($request->role);
        return redirect()->route('siteman.access.users.index')->with('toast_success', 'User berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if($user->id == auth()->user()->id, 403);
        $user->delete();
        return redirect()->back()->with('toast_success', 'User berhasil dihapus!');
        
    }

    public function bulkDelete(Request $request)
    {
        $bulkRole = $request->id;
        $user = User::whereIn('id', $bulkRole);
        $user->delete();
        return response()->json(['code' => 1, 'msg' => 'User berhasil dihapus!']);
    }

    public function syncPermissions(Request $request, User $user)
    {
        if ($request->permissions == null) {
            return redirect()->back()->with('toast_error', 'Pilih permission terlebih dahulu!');
        } else {
            $user->syncPermissions($request->permissions);
            return redirect()->back()->with('toast_success', 'Permission berhasil diterapkan!');
        }
        
    }
    public function syncRoles(Request $request, User $user)
    {
        $request->validate(['role' => 'required']);
        $user->syncRoles($request->role);
        return redirect()->back()->with('toast_success', 'Role berhasil diterapkan!');
    }

    public function resetPassword(User $user)
    {
        $user->forceFill([
            'password' => Hash::make('password'),
        ])->save();
        return redirect()->back()->with('toast_success', 'User berhasil direset!');
    }
}