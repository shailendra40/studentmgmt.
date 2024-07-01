<?php

namespace App\Models; // Adjust the namespace as per your application's structure

use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends SpatieRole
{
    use HasFactory, HasRoles;

    protected $fillable = ['name', 'guard_name'];

    // public function getpermissions()
    // {
    //     return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
    // }


    public function getpermissions()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id')
            ->where('guard_name', 'web');
    }

}
