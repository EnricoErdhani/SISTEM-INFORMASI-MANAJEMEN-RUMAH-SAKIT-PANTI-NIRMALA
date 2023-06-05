<?php

namespace App\Http\Controllers;

use App\Models\Jenis_kamar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class Jenis_KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jkamar = Jenis_kamar::paginate(10);
        return view('jenis-kamar/jenis-kamar', compact('jkamar'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis-kamar.tambah-jenis-kamar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jenis_Kamar::create([
            'ID_JKAMAR' => rand(),
            'NAMA_KAMAR' => $request->nama_kamar,
            'FASILITAS' => $request->fasilitas,
            'HARGA' => $request->harga,
            'KETERSEDIAN' => $request->ketersediaan,
        ]);
        return redirect('jenis-kamar');
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
    public function edit(Jenis_Kamar $jenis_kamar)
    {
        return view('jenis-kamar/edit-jenis-kamar', compact('jenis_kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenis_Kamar $jenis_kamar)
    {
        $jenis_kamar->update([
            'NAMA_KAMAR' => $request->nama_kamar,
            'FASILITAS' => $request->fasilitas,
            'HARGA' => $request->harga,
            'KETERSEDIAN' => $request->ketersediaan,
        ]);
        return redirect('jenis-kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis_Kamar $jenis_kamar)
    {
        $jenis_kamar->delete();
        return redirect('jenis-kamar');
    }

    public function print()
    {
        $jenis_kamar = Jenis_Kamar::get();
        $pdf = Pdf::loadview('jenis-kamar\laporan-jenis-kamar', ['jenis_kamar' => $jenis_kamar])->setPaper('a4','landscape');
        return $pdf->download('laporan-jenis-kamar.pdf');
    }
}
