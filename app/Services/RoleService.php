<?php 

namespace App\Services;

use App\Models\Role;

class RoleService {
    
    public function bulkDeleteRole($role)
    {
        $role = Role::whereIn('id', $role);
        return $role;
    }
    
}