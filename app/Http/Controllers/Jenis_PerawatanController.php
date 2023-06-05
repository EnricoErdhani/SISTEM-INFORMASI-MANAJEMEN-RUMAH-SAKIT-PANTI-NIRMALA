<?php

namespace App\Http\Controllers;

use App\Models\Jenis_Perawatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class Jenis_PerawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perawatan = Jenis_Perawatan::paginate(10);
        return view('jenis-perawatan/jenis-perawatan', compact('perawatan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis-perawatan.tambah-jenis-perawatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Jenis_Perawatan::create([
            'ID_JPERAWATAN' => rand(),
            'NAMA_PERAWATAN' => $request->nama_perawatan,
            'DESKRIPSI' => $request->deskripsi,
            'KATEGORI' => $request->kategori,
            'DURASI' => $request->durasi,
            'BIAYA' => $request->biaya,
            'PERSYARATAN' => $request->persyaratan,
            'KONTRAINDIKASI' => $request->kontraindikasi,
            'DOKTER' => $request->dokter,
            'JUMLAH_PASIEN' => $request->jumlah_pasien,
        ]);
        return redirect('jenis-perawatan');
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
    public function edit(Jenis_Perawatan $jenis_perawatan)
    {
        return view('jenis-perawatan/edit-jenis-perawatan', compact('jenis_perawatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenis_Perawatan $jenis_perawatan)
    {
        $jenis_perawatan->update([
            'NAMA_PERAWATAN' => $request->nama_perawatan,
            'DESKRIPSI' => $request->deskripsi,
            'KATEGORI' => $request->kategori,
            'DURASI' => $request->durasi,
            'BIAYA' => $request->biaya,
            'PERSYARATAN' => $request->persyaratan,
            'KONTRAINDIKASI' => $request->kontraindikasi,
            'DOKTER' => $request->dokter,
            'JUMLAH_PASIEN' => $request->jumlah_pasien,
        ]);
        return redirect('jenis-perawatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenis_Perawatan $jenis_perawatan)
    {
        $jenis_perawatan->delete();
        return redirect('jenis-perawatan');
    }

    public function print()
    {
        $jenis_perawatan = Jenis_Perawatan::get();
        $pdf = Pdf::loadview('jenis-perawatan\laporan-jenis-perawatan', ['jenis_perawatan' => $jenis_perawatan])->setPaper('a4','landscape');
        return $pdf->download('laporan-jenis-perawatan.pdf');
    }
}
