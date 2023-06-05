<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pengguna;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::join('pengguna', 'pengguna.ID_PENGGUNA', '=', 'pegawai.ID_PENGGUNA')
            ->select('pegawai.*', 'pengguna.NAMA as NAMA_PENGGUNA')
            ->paginate(10);
        return view('pegawai/pegawai', compact('pegawai'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pengguna'] = Pengguna::all();
        return view('pegawai.tambah-pegawai', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pegawai::create([
            'ID_PEGAWAI' => rand(),
            'ID_PENGGUNA' => $request->id_pengguna,
            'NAMA' => $request->nama_pegawai,
            'ALAMAT' => $request->alamat,
            'JENIS_KELAMIN' => $request->jenis_kelamin,
            'EMAIL' => $request->email,
            'NOMOR_TELEPON' => $request->no_telp,
        ]);
        return redirect('pegawai');
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
    public function edit(Pegawai $pegawai)
    {
        $data['pengguna'] = Pengguna::all();
        return view('pegawai/edit-pegawai', compact('pegawai'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $pegawai->update([
            
            'ID_PENGGUNA' => $request->id_pengguna,
            'NAMA' => $request->nama_pegawai,
            'ALAMAT' => $request->alamat,
            'JENIS_KELAMIN' => $request->jenis_kelamin,
            'EMAIL' => $request->email,
            'NOMOR_TELEPON' => $request->no_telp,
        ]);
        return redirect('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect('pegawai');
    }
    public function print()
    {
        $pegawai = Pegawai::join('pengguna', 'pengguna.ID_PENGGUNA', '=', 'pegawai.ID_PENGGUNA')
        ->select('pegawai.*', 'pengguna.NAMA as NAMA_PENGGUNA')->get();
        $pdf = Pdf::loadview('pegawai\laporan-pegawai', ['pegawai' => $pegawai])->setPaper('a4','landscape');
        return $pdf->download('laporan-pegawai.pdf');
    }
}
