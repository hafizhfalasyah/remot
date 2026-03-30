<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;

class RentController extends Controller
{
    public function index() {
        $data = Rent::get();
        return view('admin.rent-list', compact('data'));
    }

    // public function addRent() {
    //     return view('admin.add-rent');
    // }

    // public function saveRent(Request $request) {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required',
    //         'pick' => 'required',
    //         'return' => 'required',
    //     ]);

    //     $name = $request->name;
    //     $email = $request->email;
    //     $phone = $request->phone;
    //     $pick = $request->pick;
    //     $return = $request->return;

    //     $rent = new Rent();
    //     $rent->name = $name;
    //     $rent->email = $email;
    //     $rent->phone = $phone;
    //     $rent->pick = $pick;
    //     $rent->return = $return;
    //     $rent->save();

    //     return redirect()->back()->with('success', 'Rent Added Successfully');
    // }

    // public function editRent($id) {
    //     $data = Rent::where('id', '=', $id)->first();
    //     return view('admin.edit-rent', compact('data'));
    // }

    // public function updateRent(Request $request) {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'phone' => 'required',
    //         'pick' => 'required',
    //         'return' => 'required',
    //     ]);

    //     $id = $request->id;
    //     $name = $request->name;
    //     $email = $request->email;
    //     $phone = $request->phone;
    //     $pick = $request->pick;
    //     $return = $request->return;

    //     Rent::where('id', '=', $id)->update([
    //         'name' => $name,
    //         'email' => $email,
    //         'phone' => $phone,
    //         'pick' => $pick,
    //         'return' => $return
    //     ]);

    //     return redirect()->back()->with('success', 'Rent Updated Successfully');
    // }

    public function deleteRent($id) {
        Rent::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Rent Deleted Successfully');
    }
}
