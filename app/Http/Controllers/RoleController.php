<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'permission:create-role|edit-role|delete-role']) ->only(['index', 'show']);
        $this->middleware('permission:create-role')->only(['create', 'store']);
        $this->middleware('permission:edit-role')->only(['edit', 'update']);
        $this->middleware('permission:delete-role')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(3);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $permissions = Permission::get();

        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $role = Role::create(['name' => $request->name]);
        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')->withSuccess('New role is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Role $role): View
    // {
    //     $rolePermissions = Permission::join("role_has_permissions", "permission_id", "=", "id")
    //         ->where("role_id", $role->id)
    //         ->select('name')
    //         ->get();

    //     return view('roles.show', compact('role', 'rolePermissions'));
    // }



    // public function show(Role $role): View
    // {
    //     $rolePermissions = Permission::join("role_has_permissions", "permission_id", "=", "id")
    //         ->where("role_id", $role->id)
    //         ->select('name')
    //         ->get();
    //         dd('$role');

    //     return view('roles.show', compact('role', 'rolePermissions'));
    // }


    public function show($id): View
    {
        $role = Role::findById($id);
        $rolePermissions = Permission::join("role_has_permissions", "permission_id", "=", "id")
            ->where("role_id", $role->id)
            ->select('name')
            ->get();

        return view('roles.show', compact('role', 'rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Role $role): View
    // {
    //     if ($role->name === 'Super Admin') {
    //         abort(403, 'SUPER ADMIN ROLE CAN NOT BE EDITED');
    //     }

    //     $rolePermissions = DB::table("role_has_permissions")
    //         ->where("role_id", $role->id)
    //         ->pluck('permission_id')
    //         ->all();

    //     $permissions = Permission::get();

    //     return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
    // }
    public function edit(string $id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    // {
    //     $input = $request->only('name');
    //     $role->update($input);

    //     $permissions = Permission::whereIn('id', $request->permissions)->pluck('name')->toArray();
    //     $role->syncPermissions($permissions);

    //     return redirect()->back()->withSuccess('Role is updated successfully.');
    // }


    // public function update(Request $request, string $id): RedirectResponse
    // {
    //     $roles = Role::find($id);
    //     $input = $request->all();
    //     $roles->update($input);
    //     // return redirect('enrollments')->with('flash_message', 'Enrollment Update!');
    //     // return redirect('users')->with('success', 'Enrollments Updated successfully!');

    //     return redirect('roles')->with('success', 'Roles Updated successfully!');
    // }


//     public function update(Request $request, string $id): RedirectResponse
// {
//     $role = Role::find($id);
//     $input = $request->all();

//     // Update role details
//     $role->update($input);

//     // Update role permissions
//     $permissions = $request->input('permissions', []);

//     // Detach existing permissions and attach the new ones
//     $role->permissions()->detach();
//     $role->syncPermissions($permissions);

//     return redirect('roles')->with('success', 'Role and permissions updated successfully!');
// }



    public function update(Request $request, string $id): RedirectResponse
    {
        $role = Role::find($id);
        $input = $request->all();

        // Update role details
        $role->update($input);

        // Update role permissions
        $permissions = $request->input('permissions', []);

        // Detach existing permissions and attach the new ones
        $role->permissions()->sync($permissions);

        return redirect('roles')->with('success', 'Role and permissions updated successfully!');
    }



//     public function update(Request $request, string $id): RedirectResponse
// {
//     $role = Role::findOrFail($id);

//     // Update role details
//     $role->update($request->all());

//     // Update role permissions
//     $permissions = $request->input('permissions', []); // assuming the input name is 'permissions'

//     // Detach existing permissions and attach the new ones with the correct guard
//     $role->permissions()->detach();
//     $role->syncPermissions($permissions, 'web');

//     return redirect('roles')->with('success', 'Role and permissions updated successfully!');
// }






    /**
     * Remove the specified resource from storage.
     */
//     public function destroy(Role $role): RedirectResponse
// {
//     if ($role->name === 'Super Admin') {
//         abort(403, 'SUPER ADMIN ROLE CAN NOT BE DELETED');
//     }

//     // Detach the role from users before deleting
//     $usersWithRole = $role->users;
//     foreach ($usersWithRole as $user) {
//         $user->removeRole($role->name);
//     }

//     $role->delete();

//     return redirect()->route('roles.index')->withSuccess('Role is deleted successfully.');
//     }




/**
 * Remove the specified resource from storage.
 */
public function destroy(Role $id): RedirectResponse
{
    if ($id->name == 'Super Admin') {
        abort(403, 'SUPER ADMIN ROLE CAN NOT BE DELETED');
    }

    if ($this->userCanDeleteRole($id)) {
        $id->delete();
        return redirect()->route('roles.index')->withSuccess('Role is deleted successfully.');
    }

    abort(403, 'Unauthorized to delete this role.');
}

/**
 * Check if the authenticated user can delete the role.
 */
protected function userCanDeleteRole(Role $id): bool
{
    // Add your custom logic here, e.g., only allow deletion by certain roles.
    return true; // Replace with your authorization logic.
}


}
