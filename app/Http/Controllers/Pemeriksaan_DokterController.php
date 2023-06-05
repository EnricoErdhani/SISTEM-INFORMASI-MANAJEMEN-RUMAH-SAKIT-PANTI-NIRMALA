<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Pemeriksaan_Dokter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class Pemeriksaan_DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemeriksaan = Pemeriksaan_Dokter::join('dokter', 'dokter.ID_DOKTER', '=', 'pemeriksaan_dokter.ID_DOKTER')
            ->join('pasien', 'pasien.ID_PASIEN', '=', 'pemeriksaan_dokter.ID_PASIEN')
            ->select('pemeriksaan_dokter.*', 'dokter.nama as NAMA_DOKTER', 'pasien.nama as NAMA_PASIEN')
            ->paginate(10);
        return view('pemeriksaan-dokter/pemeriksaan-dokter', compact('pemeriksaan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["pasien"] = Pasien::all();
        $data["dokter"] = Dokter::all();
        return view('pemeriksaan-dokter.tambah-pemeriksaan-dokter', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pemeriksaan_Dokter::create([
            'ID_PEMERIKSAAN' => rand(),
            'ID_PASIEN' => $request->id_pasien,
            'ID_DOKTER' => $request->id_dokter,
            'TANGGAL' => $request->tanggal,
            'KELUHAN' => $request->keluhan,
            'HASIL_PEMERIKSAAN' => $request->hasil_pemeriksaan,
            'RESEP_OBAT' => $request->resep_obat,
            'BIAYA' => $request->biaya,
            'JENIS_PEMERIKSAAN' => $request->jenis_pemeriksaan,

        ]);
        return redirect('pemeriksaan-dokter');
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
    public function edit(Pemeriksaan_Dokter $pemeriksaan_dokter)
    {
        $data["pasien"] = Pasien::all();
        $data["dokter"] = Dokter::all();
        return view('pemeriksaan-dokter/edit-pemeriksaan-dokter', compact('pemeriksaan_dokter'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemeriksaan_Dokter $pemeriksaan_dokter)
    {
        $pemeriksaan_dokter->update([
            'ID_PASIEN' => $request->id_pasien,
            'ID_DOKTER' => $request->id_dokter,
            'TANGGAL' => $request->tanggal,
            'KELUHAN' => $request->keluhan,
            'HASIL_PEMERIKSAAN' => $request->hasil_pemeriksaan,
            'RESEP_OBAT' => $request->resep_obat,
            'BIAYA' => $request->biaya,
            'JENIS_PEMERIKSAAN' => $request->jenis_pemeriksaan,

        ]);
        return redirect('pemeriksaan-dokter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemeriksaan_Dokter $pemeriksaan_dokter)
    {
        $pemeriksaan_dokter->delete();
        return redirect('pemeriksaan-dokter');
    }
    public function print()
    {
        $pemeriksaan_dokter = Pemeriksaan_Dokter::join('dokter', 'dokter.ID_DOKTER', '=', 'pemeriksaan_dokter.ID_DOKTER')
        ->join('pasien', 'pasien.ID_PASIEN', '=', 'pemeriksaan_dokter.ID_PASIEN')
        ->select('pemeriksaan_dokter.*', 'dokter.nama as NAMA_DOKTER', 'pasien.nama as NAMA_PASIEN')->get();
        $pdf = Pdf::loadview('pemeriksaan-dokter\laporan-pemeriksaan-dokter', ['pemeriksaan_dokter' => $pemeriksaan_dokter])->setPaper('a4','landscape');
        return $pdf->download('laporan-pemeriksaan-dokter.pdf');
    }
}
