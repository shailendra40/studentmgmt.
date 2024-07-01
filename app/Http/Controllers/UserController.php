<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-user', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        return view('users.index', [
            'users' => User::latest('id')->paginate(3)
        ]);
    }

    public function create(): View
    {
        return view('users.create', [
            'roles' => Role::pluck('name')->all()
        ]);
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $user = User::create(array_merge(
            $request->all(),
            ['password' => Hash::make($request->password)]
        ));

        $user->assignRole($request->roles);

        return redirect()->route('users.index')
            ->withSuccess('New user is added successfully.');
    }

    // public function show(User $user): View
    // {
    //     return view('users.show', [
    //         'user' => $user
    //     ]);
    // }

    public function show(User $id): View
    {
        return view('users.show', [
            'user' => $id
        ]);
    }

    // public function show($id): View
    // {
    //     $user = User::findById($id);
    //     $permissionRoles = Role::join("role_has_permissions", "role_id", "=", "id")
    //         ->where("role_id", $user->id)
    //         ->select('name')
    //         ->get();

    //     return view('users.show', compact('user', 'rolePermissions'));
    // }

//     public function edit(User $user): View
// {
//     $this->authorize('edit-user', $user); // Use policies or gates for authorization

//     return view('users.edit', [
//         'user' => $user,
//         'roles' => Role::pluck('name')->all(),
//         'userRoles' => $user->roles->pluck('name')->all(),
//     ]);
// }


// public function edit(string $id)
//     {
//         // $batches = Batch::all();
//         $roles = Role::all();
//         // $batches = Batch::all();
//         $users = User::find($id);
//         return view('users.edit', compact('roles'));
//     }


// public function edit(string $id)
// {
//     $user = User::findOrFail($id);
//     $roles = Role::all();
//     return view('users.edit', compact('user', 'roles'));
// }


public function edit(string $id)
{
    // Cast the string ID to an integer
    $roleId = (int)$id;

    $user = User::findOrFail($roleId);
    $roles = Role::all();

    return view('users.edit', compact('user', 'roles'));
}


    // public function update(UpdateUserRequest $request, User $user): RedirectResponse
    // {
    //     $user->update(array_merge(
    //         $request->except('password'),
    //         $request->has('password') ? ['password' => Hash::make($request->password)] : []
    //     ));

    //     $user->syncRoles($request->roles);

    //     return redirect()->back()
    //         ->withSuccess('User is updated successfully.');
    // }


    // public function update(Request $request, string $id): RedirectResponse
    // {
    //     $users = User::find($id);
    //     $input = $request->all();
    //     $users->update($input);
    //     // return redirect('enrollments')->with('flash_message', 'Enrollment Update!');
    //     // return redirect('users')->with('success', 'Enrollments Updated successfully!');

    //     return redirect('users')->with('success', 'Users Updated successfully!');
    // }



// public function update(Request $request, string $id): RedirectResponse
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
        $user = User::find($id);
        $input = $request->all();

        // Update role details
        $user->update($input);

        // Update role permissions
        $roles = $request->input('roles', []);

        // Detach existing permissions and attach the new ones
        $user->roles()->sync($roles);

        return redirect('users')->with('success', 'User and roles updated successfully!');
    }


    public function destroy(User $id): RedirectResponse
    {
        // $this->authorize('delete-user', $id); // Use policies or gates for authorization

        if ($id->hasRole('Super Admin') || $id->id == auth()->user()->id) {
            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
            // abort(403, 'USER yyyyyyyy33366 ');
        }

        $id->syncRoles([]);
        $id->delete();

        return redirect()->route('users.index')
            ->withSuccess('User is deleted successfully.');
    }
}
