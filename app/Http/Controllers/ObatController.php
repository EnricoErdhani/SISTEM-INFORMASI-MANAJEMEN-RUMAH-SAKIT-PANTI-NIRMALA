<?php

namespace App\Http\Controllers;

use App\Models\obat;
use App\Models\Tenaga_Kesehatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = obat::paginate(10);
        return view('obat/obat', compact('obat'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('obat.tambah-obat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Obat::create([
            'ID_OBAT' => rand(),
            'NAMA_OBAT' => $request->nama_obat,
            'KATEGORI' => $request->kategori,
            'DESKRIPSI' => $request->deskripsi,
            'BENTUK_OBAT' => $request->bentuk_obat,
            'DOSIS' => $request->dosis,
            'CARA_PEMAKAIAN' => $request->cara_pemakaian,
            'KOMPOSISI' => $request->komposisi,
            'TANGGAL_KADALUARSA' => $request->tanggal_kadaluarsa,
            'HARGA' => $request->harga,
            'JUMLAH_STOK' => $request->jumlah_stok,
        ]);
        return redirect('obat');
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
    public function edit(Obat $obat)
    {
        return view('obat/edit-obat', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $obat->update([
            'NAMA_OBAT' => $request->nama_obat,
            'KATEGORI' => $request->kategori,
            'DESKRIPSI' => $request->deskripsi,
            'BENTUK_OBAT' => $request->bentuk_obat,
            'DOSIS' => $request->dosis,
            'CARA_PEMAKAIAN' => $request->cara_pemakaian,
            'KOMPOSISI' => $request->komposisi,
            'TANGGAL_KADALUARSA' => $request->tanggal_kadaluarsa,
            'HARGA' => $request->harga,
            'JUMLAH_STOK' => $request->jumlah_stok,
        ]);
        return redirect('obat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        $obat->delete();
        return redirect('obat');
    }
    public function print()
    {
        $obat = Obat::get();
        $pdf = Pdf::loadview('obat\laporan-obat', ['obat' => $obat])->setPaper('a4','landscape');
        return $pdf->download('laporan-obat.pdf');
    }
}
