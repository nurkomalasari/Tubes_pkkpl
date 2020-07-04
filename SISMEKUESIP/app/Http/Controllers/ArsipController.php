<?php

namespace App\Http\Controllers;

use App\Arsip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengarsipan = Arsip::paginate(10);
        return view('sekertaris.arsip.index_arsip', ['pengarsipan' => $pengarsipan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekertaris.arsip.add_arsip');
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
            'namaberkas' => 'required',
            'jenisArsip' => 'required',
            'tanggal' => 'required',
            'inputfile' => 'required|mimes:pdf,xlx,csv,docx,pptx|max:2048'
        ]);

        $path = $request->file('inputfile')->store('arsip', 'assets');
        $pengarsipan = new Arsip;
        $pengarsipan->namaberkas = $request->namaberkas;
        $pengarsipan->jenisArsip = $request->jenisArsip;
        $pengarsipan->tanggal = $request->tanggal;
        $pengarsipan->inputfile = $path;
        $pengarsipan->save();

        return redirect('/pengarsipan');
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
        $pengarsipan = Arsip::find($id);
        return view('sekertaris.arsip.edit_arsip', ['pengarsipan' => $pengarsipan]);
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
            'namaberkas' => 'required',
            'jenisArsip' => 'required',
            'tanggal' => 'required',
            'inputfile' => 'required|mimes:pdf,xlx,csv,docx,pptx|max:2048'
        ]);
        $pengarsipan = Arsip::find($id);
        Storage::disk('assets')->delete($pengarsipan->inputfile);
        $path = $request->file('inputfile')->store('arsip', 'assets');
        $pengarsipan->namaberkas = $request->namaberkas;
        $pengarsipan->jenisArsip = $request->jenisArsip;
        $pengarsipan->tanggal = $request->tanggal;
        $pengarsipan->inputfile = $path;
        $pengarsipan->save();

        return redirect('/pengarsipan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengarsipan = Arsip::find($id);
        Storage::disk('assets')->delete($pengarsipan->inputfile);
        $pengarsipan->delete();
        return redirect('/pengarsipan');
    }
}
