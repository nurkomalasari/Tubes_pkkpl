<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::paginate(10);
        return view('bendahara.pengeluaran.index_pengeluaran', ['pengeluaran' => $pengeluaran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bendahara.pengeluaran.add_pengeluaran');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nominal_pengeluaran' => 'required',
            'jenis_pengeluaran' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'buktipengeluaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $pengeluaran = $request->file('buktipengeluaran');
        $new_gambar = time() . $pengeluaran->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $pengeluaran->move($tujuan_upload, $new_gambar);
        Pengeluaran::create([
            'nominal_pengeluaran' => $request->nominal_pengeluaran,
            'jenis_pengeluaran' => $request->jenis_pengeluaran,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'buktipengeluaran' => $new_gambar
        ]);

        return redirect('/pengeluaran');
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
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        // dd($pengeluaran);
        return view('bendahara.pengeluaran.edit_pengeluaran', compact('pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nominal_pengeluaran' => 'required',
            'jenis_pengeluaran' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'buktipengeluaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->nominal_pengeluaran = $request->nominal_pengeluaran;
        $pengeluaran->jenis_pengeluaran = $request->jenis_pengeluaran;
        $pengeluaran->tanggal = $request->tanggal;
        $pengeluaran->keterangan = $request->keterangan;
        $pengeluaran->buktipengeluaran = $request->buktipengeluaran;



        // $new_gambar = time() . $pengeluaran->getClientOriginalName();

        // $pengeluaran = $request->file('buktipengeluaran');
        // $tujuan_upload = 'data_file';
        // $pengeluaran->move($tujuan_upload, $new_gambar);
        // // $pengeluaran->nominal_pengeluaran = $request->nominal_pengeluaran;
        // // $pengeluaran->jenis_pengeluaran = $request->jenis_pengeluaran;
        // // $pengeluaran->tanggal = $request->tanggal;
        // // $pengeluaran->keterangan = $request->keterangan;
        // $pengeluaran->buktipengeluaran =  $new_gambar;

        $pengeluaran->update();

        return redirect('/pengeluaran');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        return redirect('/pengeluaran');
    }
}
