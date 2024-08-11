<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Person;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function create()
    {
        // dd('masuk page');
        return view('pages.create');
    }

    public function showName(Request $request)
    {
        $fullname = $request->fullname;
        return view('pages.create', ['fullname' => $fullname]);
    }

    public function viewName(Request $request)
    {
        $fullname = $request->fullname;
        return view('pages.create', ['fullname' => $fullname]);
    }

    public function tambah()
    {
        return view('pages.tambah');
    }

    public function simpan(Request $request)
    {
        // Person::create([
        //     'name' => $request->fullname
        // ]);

        // $person = new Person();
        // $person->name = $request->fullname;
        // $person->save();

        // dd($request->all());

        // $pengguna = new Pengguna();
        // $pengguna->nama = $request->fullname;
        // $pengguna->email = $request->email;
        // $pengguna->alamat = $request->alamat;

        Pengguna::create([
            'nama' => $request->fullname,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->back();
    }
}
