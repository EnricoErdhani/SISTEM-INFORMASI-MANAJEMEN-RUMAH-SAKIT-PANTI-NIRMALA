<?php

namespace App\Http\Controllers;

use App\Models\Jenis_kamar;
use App\Models\kamar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = kamar::join('jenis_kamar', 'kamar.ID_JKAMAR', '=', 'jenis_kamar.ID_JKAMAR')
            ->select('kamar.*', 'jenis_kamar.nama_kamar as NAMA_JENIS')
            ->paginate(10);
        return view('kamar/kamar', compact('kamar'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data["jenis"] = Jenis_kamar::all();
        return view('kamar/tambah-kamar', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kamar::create([
            'ID_KAMAR' => rand(),
            'ID_JKAMAR' => $request->id_jkamar,
            'NAMA_KAMAR' => $request->nama_kamar,
        ]);
        return redirect('kamar');
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
    public function edit(Kamar $kamar)
    {
        $data["jenis"] = Jenis_kamar::all();
        return view('kamar/edit-kamar', compact('kamar'), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {
        $kamar->update([
            'ID_JKAMAR' => $request->id_jkamar,
            'NAMA_KAMAR' => $request->nama_kamar,
        ]);
        return redirect('kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect('kamar');
    }
    public function print()
    {
        $kamar = kamar::join('jenis_kamar', 'kamar.ID_JKAMAR', '=', 'jenis_kamar.ID_JKAMAR')
        ->select('kamar.*', 'jenis_kamar.nama_kamar as NAMA_JENIS')->get();
        $pdf = Pdf::loadview('kamar\laporan-kamar', ['kamar' => $kamar])->setPaper('a4','landscape');
        return $pdf->download('laporan-kamar.pdf');
    }
}
