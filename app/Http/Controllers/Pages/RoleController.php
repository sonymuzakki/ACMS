<?php

namespace App\Http\Controllers\Pages;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index()
    {
        $permission = Permission::latest()->get();
        return view('backend.pages.permission.index_permission', compact('permission'));
    }

    public function index1(Request $request)
    {
        if ($request->ajax()) {
            $query = Permission::latest();

            // Apply custom filter if provided
            if ($request->customFilter) {
                $query->where(function($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->customFilter . '%')
                    ->orWhere('group_name', 'like', '%' . $request->customFilter . '%');
                });
            }

            $users = $query->get();

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $permission = permission::latest()->get();
        return view('backend1.master.permission.index', compact('permission'));
    }

    public function StorePermission(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,

        ]);

        $notification = [
            'message' => 'Permission Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('permission.index1')->with($notification);
    }

    public function UpdatePermission(Request $request)
    {
        $per_id = $request->id;

        Permission::find($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = [
            'message' => 'Permission Insert Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('permission.index1')->with($notification);

    }

    public function DeletePermission($id)
    {
        Permission::find($id)->delete();

        $notification = [
            'message' => 'Permission Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    // Role Controller
    public function RoleIndex()
    {
        $roles = Role::latest()->get();
        return view('backend.pages.roles.index_roles', compact('roles'));
    }

    public function RoleIndex1(Request $request)
    {
        // $roles = Role::latest()->get();
        // return view('backend1.master.role.index', compact('roles'));
        if ($request->ajax()) {
            $query = Role::latest();

            // Apply custom filter if provided
            if ($request->customFilter) {
                $query->where(function($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->customFilter . '%');
                });
            }

            $users = $query->get();

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // Tambahkan tombol aksi di sini
                    // return '<a href="#" class="btn btn-sm btn-primary">Edit</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $roles = Role::all();
        return view('backend1.master.role.index', compact('roles'));

    }

    public function RoleAdd()
    {
        return view('backend.pages.roles.add_roles');
    }

    public function RoleStore(Request $request)
    {
        $roles = Role::create([
            'name' => $request->name,

        ]);

        $notification = [
            'message' => 'roles Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('roles.index')->with($notification);
    }

    public function RoleEdit($id)
    {
        $roles = Role::find($id);
        return view('backend.pages.roles.edit_roles',compact('roles'));
    }

    public function RoleUpdate(Request $request)
    {
        $per_id = $request->id;

        Role::find($per_id)->update([
            'name' => $request->name,
        ]);

        $notification = [
            'message' => 'Permission Insert Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('roles.index')->with($notification);
    }

    public function RoleDeleted($id)
    {
        Role::find($id)->delete();

        $notification = [
            'message' => 'Role Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    // Role & Permission
    public function AddRolePermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.rolesetup.add_roles_permission',compact('roles','permissions','permission_groups'));
    }

    public function StoreRolePermission(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        return redirect()->route('all.roles.permission1');
    }

    // public function StoreRolePermission(Request $request)
    // {
    //     // Log role_id to check if it's being received correctly
    //     \Log::info('Role ID: ' . $request->role_id);

    //     $data = array();
    //     $permissions = $request->permission;

    //     foreach ($permissions as $key => $item) {
    //         $data['role_id'] = $request->role_id;
    //         $data['permission_id'] = $item;

    //         // Log the data being inserted
    //         \Log::info('Inserting data: ', $data);

    //         DB::table('role_has_permissions')->insert($data);
    //     }

    //     return redirect()->route('all.roles.permission');
    // }


    public function AllRolePermission()
    {

        $roles = Role::all();
        return view('backend.pages.rolesetup.all_roles_permission',compact('roles'));
    }

    public function AllRolePermission1(Request $request)
    {
        // if ($request->ajax()) {
        //     $query = Role::latest();

        //     // Apply custom filter if provided
        //     if ($request->customFilter) {
        //         $query->where(function($query) use ($request) {
        //             $query->where('name', 'like', '%' . $request->customFilter . '%');
        //         });
        //     }

        //     $users = $query->get();

        //     return DataTables::of($users)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {
        //             // Tambahkan tombol aksi di sini
        //             // return '<a href="#" class="btn btn-sm btn-primary">Edit</a>';
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        // $roles = Role::all();
        // return view('backend1.master.permission.index_permission', compact('roles'));
            if ($request->ajax()) {
                $query = Role::with('permissions')->latest();

                // Apply custom filter if provided
                if ($request->customFilter) {
                    $query->where(function($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->customFilter . '%');
                    });
                }

                $roles = $query->get();

                return DataTables::of($roles)
                    ->addIndexColumn()
                    ->addColumn('permission' , function($row){
                        return $row->permission;
                    })
                    ->addColumn('action', function ($row) {
                        // return '<a href="#" onclick="openEditModal(' . $row->id . ', \'' . htmlspecialchars($row->name) . '\', \'' . htmlspecialchars($row->group_name) . '\')" class="btn btn-success btn-sm mr-2"><i class="fas fa-edit"></i></a>';
                    })
                    ->rawColumns(['permissions', 'action'])
                    ->make(true);
            }
            $roles = Role::all();
            $permissions = Permission::all();
            $permission_groups = User::getpermissionGroups();
            return view('backend1.master.permission.index_permission', compact('roles','permissions','permission_groups'));
    }

    public function EditRolePermission($id)
    {
        $roles = Role::find($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.rolesetup.edit_roles_permission',compact('roles','permissions','permission_groups'));
    }

    public function EditRolePermission1($id)
    {
        $roles = Role::find($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend1.master.permission.edit_permission',compact('roles','permissions','permission_groups'));
    }

    // public function UpdateRolePermission(Request $request, $id)
    // {
    //     $role = Role::find($id);
    //     $permissionIds = $request->permission;

    //     if (!empty($permissionIds)) {
    //         // Retrieve permission names or objects based on the provided IDs
    //         $permissions = Permission::whereIn('id', $permissionIds)->get();

    //         // Sync permissions using names
    //         $role->syncPermissions($permissions);
    //     }

    //     return redirect()->route('all.roles.permission1');
    // }

    public function UpdateRolePermission(Request $request, $id)
    {
        $role = Role::find($id);
        $permissionIds = $request->permission;

        if (!empty($permissionIds)) {
            // Retrieve the permissions based on the provided IDs
            $permissions = Permission::whereIn('id', $permissionIds)->get();
        } else {
            // If no permissions are checked, pass an empty array to syncPermissions
            $permissions = [];
        }

        // Sync permissions
        $role->syncPermissions($permissions);

        return redirect()->route('all.roles.permission1')->with('success', 'Permissions updated successfully.');
    }

    // public function DeleteRolePermission($id)
    // {
    //     $role = Role::find($id);
    //     $permission = Permission::all();
    //     if (!is_null($permission)) {
    //        $role->delete();
    //     }

    //     return redirect()->back();
    // }

    public function DeleteRolePermission($id)
    {
        $role = Role::find($id);

        if ($role) {
            // Detach all permissions associated with the role
            $role->permissions()->detach();
        }

        return redirect()->back()->with('success', 'Role permissions deleted successfully.');
    }
}
