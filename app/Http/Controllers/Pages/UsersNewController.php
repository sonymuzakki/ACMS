<?php

namespace App\Http\Controllers\Pages;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class UsersNewController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::with('role');

            // Apply custom filter if provided
            if ($request->customFilter) {
                $query->where(function($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->customFilter . '%')
                        ->orWhere('email', 'like', '%' . $request->customFilter . '%');
                });
            }

            $users = $query->get();

            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    // Tambahkan tombol aksi di sini
                    return '<a href="#" class="btn btn-sm btn-primary">Edit</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('backend1.master.user.index', compact('users', 'roles'));
    }

    public function add()
    {
        $users = User::all();
        $roles = Role::all();
        return view('backend1.master.user.add',compact('users','roles'));
    }

    public function store(Request $request)
    {
        Log::info('Store User method called');

        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255|unique:users,email',
        //     'password' => 'required|string|min:8',
        //     'role_id' => 'required|integer',
        // ]);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        Log::info('Data validated', $validatedData);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => $validatedData['role_id'],
        ]);

        Log::info('User created successfully');

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view('backend1.master.user.edit',compact('users','roles'));
    }

    public function update(Request $request, $id)
    {
        Log::info('Update User method called');
        $users = User::findOrFail($id);
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => bcrypt($request->password),
        ]);

        Log::info('Update User successfully');

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        Log::info('Delete User method called');
        $users = User::findOrFail($id);
        $users->delete();

        Log::info('User Deleted successfully');

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

}
