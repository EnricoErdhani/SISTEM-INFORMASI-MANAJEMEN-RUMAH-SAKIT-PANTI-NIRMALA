<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Tenaga_Kesehatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class Tenaga_KesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenkes = Tenaga_Kesehatan::join('pengguna', 'pengguna.ID_PENGGUNA', '=', 'tenaga_kesehatan.ID_PENGGUNA')
            ->select('tenaga_kesehatan.*', 'pengguna.nama as NAMA_PENGGUNA')
            ->paginate(10);
        return view('tenaga-kesehatan/tenaga-kesehatan', compact('tenkes'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["pengguna"] = Pengguna::all();
        return view('tenaga-kesehatan.tambah-tenaga-kesehatan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tenaga_kesehatan::create([
            'ID_TKESEHATAN' =>rand(),
            'ID_PENGGUNA' => $request->id_pengguna,
            'NOMOR_IZIN_PRAKTIK' => $request->nomor_izin_praktik,
            'TANGGAL_KADALUARSA_IZIN_PRAKTIK' => $request->tanggal_kadaluarsa_izin_praktik,
             'NAMA' => $request->nama,
            'JENIS_KELAMIN' => $request->jenis_kelamin,
            'EMAIL' => $request->email,
            'SPESIALISASI' => $request->spesialisasi,
            'GAJI' => $request->gaji,
            'STATUS' => $request->status,
        ]);
        return redirect('tenaga-kesehatan');
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
    public function edit(Tenaga_Kesehatan $tenaga_kesehatan)
    {
        $data['pengguna'] = Pengguna::all();
        return view('tenaga-kesehatan/edit-tenaga-kesehatan',compact('tenaga_kesehatan'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenaga_Kesehatan $tenaga_kesehatan)
    {
        $tenaga_kesehatan->update([
            'ID_PENGGUNA' => $request->id_pengguna,
            'NOMOR_IZIN_PRAKTIK' => $request->nomor_izin_praktik,
            'TANGGAL_KADALUARSA_IZIN_PRAKTIK' => $request->tanggal_kadaluarsa_izin_praktik,
             'NAMA' => $request->nama,
            'JENIS_KELAMIN' => $request->jenis_kelamin,
            'EMAIL' => $request->email,
            'SPESIALISASI' => $request->spesialisasi,
            'GAJI' => $request->gaji,
            'STATUS' => $request->status,
        ]);
        return redirect('tenaga-kesehatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenaga_Kesehatan $tenaga_kesehatan)
    {
        $tenaga_kesehatan->delete();
        return redirect('tenaga-kesehatan');
    }
    public function print()
    {
        $tenaga_kesehatan = Tenaga_Kesehatan::join('pengguna', 'pengguna.ID_PENGGUNA', '=', 'tenaga_kesehatan.ID_PENGGUNA')
        ->select('tenaga_kesehatan.*', 'pengguna.nama as NAMA_PENGGUNA')->get();
        $pdf = Pdf::loadview('tenaga-kesehatan\laporan-tenaga-kesehatan', ['tenaga_kesehatan' => $tenaga_kesehatan])->setPaper('a4','landscape');
        return $pdf->download('laporan-tenaga-kesehatan.pdf');
    }
}
