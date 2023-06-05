<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = Pengguna::paginate(10);
        return view('pengguna/pengguna', compact('pengguna'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.tambah-pengguna');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pengguna::create([
            'ID_PENGGUNA' => rand(),
            'NAMA' => $request->nama,
            'USERNAME' => $request->username,
            'PASSWORD' => $request->password,
            'JABATAN' => $request->jabatan,

        ]);
        return redirect('pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna $pengguna)
    {
        return view('pengguna/edit-pengguna', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        $pengguna->update([
            'NAMA' => $request->nama,
            'USERNAME' => $request->username,
            'PASSWORD' => $request->password,
            'JABATAN' => $request->jabatan,

        ]);
        return redirect('pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect('pengguna');
    }
    public function print()
    {
        $pengguna = Pengguna::get();
        $pdf = Pdf::loadview('pengguna\laporan-pengguna', ['pengguna' => $pengguna])->setPaper('a4','landscape');
        return $pdf->download('laporan-pengguna.pdf');
    }
}
