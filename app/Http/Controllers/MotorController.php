<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use Illuminate\Support\Facades\DB;

class MotorController extends Controller
{
    public function index() {
        $data = Motor::get();
        return view('admin.motor-list', compact('data'));
    }

    public function addMotor() {
        return view('admin.add-motor');
    }

    public function saveMotor(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'year' => 'required',
            'merk' => 'required',
            'price' => 'required',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $year = $request->year;
        $merk = $request->merk;
        $price = $request->price;

        $motor = new Motor();
        $motor->image = $imageName;
        $motor->year = $year;
        $motor->merk = $merk;
        $motor->price = $price;
        $motor->save();

        $image->move(public_path('img'), $imageName);

        return redirect()->back()->with('success', 'Motor Added Successfully');
    }

    public function editMotor($id) {
        $data = Motor::where('id', '=', $id)->first();
        return view('admin.edit-motor', compact('data'));
    }

    public function updateMotor(Request $request) {
        $request->validate([
            'image' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            'year' => 'required',
            'merk' => 'required',
            'price' => 'required',
        ]);

        $id = $request->id;
        $image = $request->file('image');
        $year = $request->year;
        $merk = $request->merk;
        $price = $request->price;

        $motor = Motor::find($id);

        if ($image) {
            $oldImage = $motor->image;
            $imageName = time() . '.' . $image->extension();

            $motor->image = $imageName;
            $image->move(public_path('img'), $imageName);

            if ($oldImage) {
                unlink(public_path('img/' . $oldImage));
            }
        }

        $motor->year = $year;
        $motor->merk = $merk;
        $motor->price = $price;
        $motor->save();

        return redirect()->back()->with('success', 'Motor Updated Successfully');
    }

    public function deleteMotor($id) {
        Motor::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'Motor Deleted Successfully');
    }

    // untuk halaman pencarian
    public function allMotors() {
        return view ('user.all');
    }

    // untuk konten default (tidak ada pencarian)
    public function read() {
        $data = Motor::all();
        return view('user.ajaxpage', compact('data'));
    }

    // untuk konten hasil pencarian
    public function ajax(Request $request) {
        $merk = $request->merk;
        $result = Motor::where('merk', 'like', '%'.$merk.'%')->get();
        $count = count($result);

        if ($count == 0) {
            return '<p style="color: red; font-size: 16px; text-align: center; margin-top: 15px;">Maaf, Data tidak ditemukan</p>';
        } else {
            return view('user.ajaxpage')->with([
                'data' => $result
            ]);
        }
    }
}
