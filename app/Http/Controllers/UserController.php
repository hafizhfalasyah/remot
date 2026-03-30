<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $data = User::get();
        return view('admin.user-list', compact('data'));
    }

    public function addUser() {
        return view('admin.add-user');
    }

    public function saveUser(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = bcrypt($request->password);

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();

        return redirect()->back()->with('success', 'User Added Successfully');
    }

    // public function editUser($id) {
    //     $data = User::where('id', '=', $id)->first();
    //     return view('admin.edit-user', compact('data'));
    // }

    // public function updateUser(Request $request) {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $id = $request->id;
    //     $name = $request->name;
    //     $email = $request->email;
    //     $password = bcrypt($request->password);

    //     User::where('id', '=', $id)->update([
    //         'name' => $name,
    //         'email' => $email,
    //         'password' => $password,
    //     ]);

    //     return redirect()->back()->with('success', 'User Updated Successfully');
    // }

    public function deleteUser($id) {
        User::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'User Deleted Successfully');
    }
}
