<?php

namespace App\Http\Controllers;

use App\Models\suplier;
use Illuminate\Http\Request;

class suplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = suplier::where(
            'nama_suplier',
            'like',
            "%{$search}%"
        )->orWhere(
            'telp',
            'like',
            "%{$search}%"
        )->paginate();

        return view('suplier.suplier', compact(
            'data'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suplier.addsuplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_suplier' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'email' => 'required|email',
            'tgl_terdaftar' => 'required',
            'status' => 'required',
        ],[
            'nama_suplier.required' => 'Data wajib diisi',
            'email.required' => 'Data wajib diisi',
            'email.email' => 'Format email tidak sesuai',
            'telp.reqeuired' => 'Data wajib diisi',
            'tgl_terdaftar.required' =>  'Data wajib diisi',
            'status.required' =>  'Data wajib diisi',

        ]);
        $SaveSuplier = new suplier();
        $SaveSuplier->nama_suplier = $request->nama_suplier; 
        $SaveSuplier->alamat = $request->alamat;
        $SaveSuplier->telp = $request->telp;
        $SaveSuplier->email = $request->email;
        $SaveSuplier->tgl_terdaftar = $request->tgl_terdaftar;
        $SaveSuplier->status = $request->status;
        $SaveSuplier->save();
         
        return redirect('/suplier')->with(
            'message',
            'Data' . $request->nama_suplier . 'berhasil ditambahkan'

        );
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $getSuplier = suplier::find($id);
        return view('suplier.editsuplier', compact(
            'getSuplier',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_suplier' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'email' => 'required|email',
            'tgl_terdaftar' => 'required',
            'status' => 'required',
        ],[
            'nama_suplier.required' => 'Data wajib diisi',
            'email.required' => 'Data wajib diisi',
            'email.email' => 'Format email tidak sesuai',
            'telp.reqeuired' => 'Data wajib diisi',
            'tgl_terdaftar.required' =>  'Data wajib diisi',
            'status.required' =>  'Data wajib diisi',

        ]);
        
        $SaveSuplier = suplier::find($id);
        $SaveSuplier->nama_suplier = $request->nama_suplier; 
        $SaveSuplier->alamat = $request->alamat;
        $SaveSuplier->telp = $request->telp;
        $SaveSuplier->email = $request->email;
        $SaveSuplier->tgl_terdaftar = $request->tgl_terdaftar;
        $SaveSuplier->status = $request->status;
        $SaveSuplier->save();
         
        return redirect('/suplier')->with(
            'message',
            'Data' . $request->nama_suplier . 'berhasil diperbarui!!!'

        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
