<?php

namespace App\Http\Controllers;

use App\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukan = Pemasukan::paginate(10);
        return view('bendahara.pemasukan.index_pemasukan', ['pemasukan' => $pemasukan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bendahara.pemasukan.add_pemasukan');
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
            'nominal_pemasukan' => 'required',
            'jenis_pemasukan' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]);

        // pemasukan::create([
        // 	'nominal_pemasukan' => $request->nominal_pemasukan,
        //     'jenis_pemasukan' => $request->jenis_pemasukan,
        //     'tanggal' => $request->tanggal,
        //     'keterangan' => $request->keterangan,

        // ]);

        $pemasukan = new pemasukan();
        $pemasukan->nominal_pemasukan = $request->nominal_pemasukan;
        $pemasukan->jenis_pemasukan = $request->jenis_pemasukan;
        $pemasukan->tanggal = $request->tanggal;
        $pemasukan->keterangan = $request->keterangan;
        $pemasukan->save();
        // pemasukan::create($request->all());

        return redirect('/pemasukan');
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
        $pemasukan = Pemasukan::find($id);
        return view('bendahara.pemasukan.edit_pemasukan', ['pemasukan' => $pemasukan]);
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
            'nominal_pemasukan' => 'required',
            'jenis_pemasukan' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]);
        $pemasukan = Pemasukan::find($id);
        $pemasukan->nominal_pemasukan = $request->nominal_pemasukan;
        $pemasukan->jenis_pemasukan = $request->jenis_pemasukan;
        $pemasukan->tanggal = $request->tanggal;
        $pemasukan->keterangan = $request->keterangan;
        $pemasukan->save();
        return redirect('/pemasukan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemasukan = Pemasukan::find($id);
        $pemasukan->delete();
        return redirect('/pemasukan');
    }
}
