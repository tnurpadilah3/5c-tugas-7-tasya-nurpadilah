<?php

namespace App\Http\Controllers;

use App\Models\Pelayan;
use Illuminate\Http\Request;

class PelayanController extends Controller
{
    public function index(){
        $pelayans = Pelayan::get();
        return view('pelayan.index', compact('pelayans'));
    }

    public function create(){
        return view('pelayan.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'kode_pelayan' => 'required',
            'nama_pelayan' => 'required',
            'menu_buket' => 'required'
        ]);

        Pelayan::create($validate);
        return redirect() -> route('pelayan.index') -> with('message', "Data Pelayan {$validate['nama_pelayan']} berhasil ditambahkan");
    }

    public function destroy(Pelayan $pelayan){
        $pelayan->delete();
        return redirect()->route('pelayan.index') -> with('message', "Data Pelayan {$pelayan->nama_pelayan} berhasil dihapus");
    }

    public function edit(Pelayan $pelayan){
        return view('pelayan.edit', compact('pelayan'));
    }

    public function update(Request $request, Pelayan $pelayan){
        $validate = $request->validate([
            'kode_pelayan' => 'required',
            'nama_pelayan' => 'required',
            'menu_buket' => 'required'
        ]);

        $pelayan -> update($validate);

        return redirect() -> route('pelayan.index') -> with('message', "Data Pelayan {$pelayan->nama_pelayan} berhasil diubah");
    }

    public function show(Pelayan $pelayan)
    {
        return view('pelayan.show', compact('pelayan'));
    }
}

