<?php

namespace App\Http\Controllers\Access;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\PermissionDataTable;
use App\Http\Requests\Permission\StorePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;

class PermissionController extends Controller
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
    public function index(PermissionDataTable $dataTable)
    {
        return $dataTable->render('backend.access.permission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.access.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Permission\StorePermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        Permission::create($request->validated() + ['guard_name' => 'web']);
        return redirect()->route('siteman.access.permissions.index')->with('toast_success', 'Permission berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('backend.access.permission.show',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('backend.access.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Permission\UpdatePermissionRequest  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        if ($permission->roles->count()) {
            return redirect()->back()->with('toast_error', 'Ada sesuatu yang salah!');
        } else {
            $permission->update($request->validated());
            return redirect()->route('siteman.access.permissions.index')->with('toast_success', 'Permission berhasil diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        if($permission->roles->count()){
            return redirect()->back()->with('toast_error', 'Ada sesuatu yang salah!');
        }else{
            $permission->delete();
            return redirect()->route('siteman.access.permissions.index')->with('toast_success', 'Permission berhasil dihapus!');
        }
    }

    public function bulkDelete(Request $request)
    {
        $bulkPermission = $request->id;
        $permission = Permission::whereIn('id', $bulkPermission);
        $permission->delete();
        return response()->json(['code' => 1, 'msg' => 'Permission berhasil dihapus!']);
    }
}