<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Pekerja;
use App\DetailPekerja;
use Illuminate\Support\Facades\Hash;

class PekerjaRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:pekerja');
    }

    public function showRegistrationForm()
    {
        return view('auth.pekerja-register');
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

        $pekerja = Pekerja::create(['email' => $req->email,
                                    'password' => Hash::make($req->password),
                                    'jenisPekerjaan' => $req->jenisPekerjaan,
                                ]);
        if ($req->hasFile('fotoKTP') && $req->hasFile('fotoDiri')) {
            $namaFileKTP = $req->fotoKTP->getClientOriginalName();
            $req->fotoKTP->storeAs('public/img/profile/',$namaFileKTP); 
            $namaFileDiri = $req->fotoDiri->getClientOriginalName();
            $req->fotoDiri->storeAs('public/img/profile/',$namaFileDiri); 
        }

        $detail = DetailPekerja::create([
            'id_pekerja' => $pekerja->id,
            'nama' => $req->nama,
            'nomorKTP' => $req->nomorKTP,
            'usia' => $req->usia,
            'tel' => $req->tel,
            'alamat' => $req->alamat,
            'keahlian' => $req->keahlian,
            'kondisiKhusus' => $req->kondisiKhusus,
            'agama' => $req->agama,
            'fotoKTP' => $namaFileKTP,
            'fotoDiri' => $namaFileDiri
        ]);

        return redirect()->route('pekerja.login');

    }
}
