<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Majikan;
use App\DetailMajikan;
use Illuminate\Support\Facades\Hash;

class MajikanRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:majikan');
    }

    public function showRegistrationForm()
    {
        return view('auth.majikan-register');
    }

    public function register(Request $req)
    {
        // $this->validate($req,[
        //     'email' => 'required|string|email|max:191|unique:pekerja',
        //     'password' => 'required|string|min:4',
        //     // 'status' => 'required|string',
        //     'nama' => 'required|string|max:255',
        //     'nomorKTP' => 'required|string|max:18',
        //     'ttl' => 'required',
        //     'tel' => 'required|string|max:13',
        //     'alamat' => 'required|string|max:255',
        //     'keahlian' => 'sometimes|string|max:1000',
        //     'kondisiKhusus' => 'sometimes|string|max:1000',
        //     'agama' => 'required|string|max:255',
        //     'jenisPekerjaan' => 'required',
        //     'fotoKTP' => 'sometimes',
        //     'fotoDiri' => 'sometimes'
        // ]);

        $majikan = Majikan::create(['email' => $req->email,
                                    'password' => Hash::make($req->password),
                                ]);
        if ($req->hasFile('fotoKTP') && $req->hasFile('fotoDiri')) {
            $namaFileKTP = $req->fotoKTP->getClientOriginalName();
            $req->fotoKTP->storeAs('public/img/profile/',$namaFileKTP); 
            $namaFileDiri = $req->fotoDiri->getClientOriginalName();
            $req->fotoDiri->storeAs('public/img/profile/',$namaFileDiri); 
        }

        $detail = DetailMajikan::create([
            'id_majikan' => $majikan->id,
            'nama' => $req->nama,
            'nomorKTP' => $req->nomorKTP,
            'tel' => $req->tel,
            'alamat' => $req->alamat,
            'fotoKTP' => $namaFileKTP,
            'fotoDiri' => $namaFileDiri
        ]);

        return redirect()->route('majikan.login');

    }
}
