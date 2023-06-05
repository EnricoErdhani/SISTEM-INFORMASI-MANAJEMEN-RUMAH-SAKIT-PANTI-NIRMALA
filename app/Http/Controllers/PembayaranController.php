<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jenis_Perawatan;
use App\Models\kamar;
use App\Models\obat;
use App\Models\Pasien;
use App\Models\Pegawai;
use App\Models\Pembayaran;
use App\Models\Pemeriksaan_Dokter;
use App\Models\Tenaga_Kesehatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran = Pembayaran::join('tenaga_kesehatan', 'pembayaran.ID_TKESEHATAN', '=', 'tenaga_kesehatan.ID_TKESEHATAN')
            ->join('pasien', 'pembayaran.ID_PASIEN', '=', 'pasien.ID_PASIEN')
            ->join('kamar', 'pembayaran.ID_KAMAR', '=', 'kamar.ID_KAMAR')
            ->join('dokter', 'pembayaran.ID_DOKTER', '=', 'dokter.ID_DOKTER')
            ->join('pemeriksaan_dokter', 'pembayaran.ID_PEMERIKSAAN', '=', 'pemeriksaan_dokter.ID_PEMERIKSAAN')
            ->join('jenis_perawatan', 'pembayaran.ID_JPERAWATAN', '=', 'jenis_perawatan.ID_JPERAWATAN')
            ->join('obat', 'pembayaran.ID_OBAT', '=', 'obat.ID_OBAT')
            ->select('pembayaran.*', 'dokter.NAMA as NAMA_DOKTER', 'jenis_perawatan.NAMA_PERAWATAN as NAMA_JENIS', 'obat.NAMA_OBAT as NAMA_OBAT', 'pemeriksaan_dokter.*', 'tenaga_kesehatan.NAMA as NAMA_TENKES', 'pasien.NAMA as NAMA_PASIEN', 'kamar.NAMA_KAMAR as NAMA_KAMAR')
            ->paginate(10);
        return view('pembayaran/pembayaran', compact('pembayaran'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pasien'] = Pasien::all();
        $data['kamar'] = kamar::all();
        $data['dokter'] = Dokter::all();
        $data['pemeriksaan'] = Pemeriksaan_Dokter::all();
        $data['jenis'] = Jenis_Perawatan::all();
        $data['obat'] = obat::all();
        $data['tenkes'] = Tenaga_Kesehatan::all();
        return view('pembayaran.tambah-pembayaran', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pembayaran::create([
            'ID_PEMBAYARAN' => rand(),
            'ID_PASIEN' => $request->id_pasien,
            'ID_DOKTER' => $request->id_dokter,
            'ID_TKESEHATAN' => $request->id_tkesehatan,
            'ID_JPERAWATAN' => $request->id_jperawatan,
            'ID_PEMERIKSAAN' => $request->id_pemeriksaan,
            'ID_OBAT' => $request->id_obat,
            'ID_KAMAR' => $request->id_kamar,
        ]);
        return redirect('pembayaran');
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
    public function edit(Pembayaran $pembayaran)
    {
        $data['pasien'] = Pasien::all();
        $data['kamar'] = kamar::all();
        $data['dokter'] = Dokter::all();
        $data['pemeriksaan'] = Pemeriksaan_Dokter::all();
        $data['jenis'] = Jenis_Perawatan::all();
        $data['obat'] = obat::all();
        $data['tenkes'] = Tenaga_Kesehatan::all();
        return view('pembayaran/edit-pembayaran', compact('pembayaran'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        $pembayaran->update([
            'ID_PASIEN' => $request->id_pasien,
            'ID_DOKTER' => $request->id_dokter,
            'ID_TKESEHATAN' => $request->id_tkesehatan,
            'ID_JPERAWATAN' => $request->id_jperawatan,
            'ID_PEMERIKSAAN' => $request->id_pemeriksaan,
            'ID_OBAT' => $request->id_obat,
            'ID_KAMAR' => $request->id_kamar,
        ]);
        return redirect('pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();
        return redirect('pembayaran');
    }
    public function print()
    {
        $pembayaran = Pembayaran::join('tenaga_kesehatan', 'pembayaran.ID_TKESEHATAN', '=', 'tenaga_kesehatan.ID_TKESEHATAN')
        ->join('pasien', 'pembayaran.ID_PASIEN', '=', 'pasien.ID_PASIEN')
        ->join('kamar', 'pembayaran.ID_KAMAR', '=', 'kamar.ID_KAMAR')
        ->join('dokter', 'pembayaran.ID_DOKTER', '=', 'dokter.ID_DOKTER')
        ->join('pemeriksaan_dokter', 'pembayaran.ID_PEMERIKSAAN', '=', 'pemeriksaan_dokter.ID_PEMERIKSAAN')
        ->join('jenis_perawatan', 'pembayaran.ID_JPERAWATAN', '=', 'jenis_perawatan.ID_JPERAWATAN')
        ->join('obat', 'pembayaran.ID_OBAT', '=', 'obat.ID_OBAT')
        ->select('pembayaran.*', 'dokter.NAMA as NAMA_DOKTER', 'jenis_perawatan.NAMA_PERAWATAN as NAMA_JENIS', 'obat.NAMA_OBAT as NAMA_OBAT', 'pemeriksaan_dokter.*', 'tenaga_kesehatan.NAMA as NAMA_TENKES', 'pasien.NAMA as NAMA_PASIEN', 'kamar.NAMA_KAMAR as NAMA_KAMAR')->get();
        $pdf = Pdf::loadview('pembayaran\laporan-pembayaran', ['pembayaran' => $pembayaran])->setPaper('a4','landscape');
        return $pdf->download('laporan-pembayaran.pdf');
    }
}
