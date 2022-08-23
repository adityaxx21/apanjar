<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Katalog;
use Illuminate\Http\Request;

class Katalog_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'nama_item' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'jenis_id' => 'required',
            'gambar' =>'required',
            'satuan' => 'required'
        ]);
        unset($validatedData['gambar']);
        if ($request->hasfile('gambar')) {
            $name = time() . rand(1, 100) . '.' . $request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('gambar'), $name);
            $validatedData = array_merge($validatedData,['gambar'=>$name]);
        }

        $post = Katalog::create($validatedData);

        // return redirect('/halaman_admin')
        //     ->with('success', 'Barang berhasil dihapus');
        if ($post) {
            return 'success';
        } else {
            return 'failed';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['item'] = Katalog::where('jenis_id',$id)->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validatedData = $this->validate($request, [
            'nama_item' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'jenis_id' => 'required',
            'satuan' => 'required'
        ]);
        if ($request->hasfile('gambar')) {
            $name = time() . rand(1, 100) . '.' . $request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('gambar'), $name);
            $validatedData = array_merge($validatedData,['gambar'=>$name]);
        }

        $post = Katalog::where('id',$id)->update($validatedData);

        // return redirect('/halaman_admin')
        //     ->with('success', 'Barang berhasil dihapus');
        if ($post) {
            return 'success';
        } else {
            return 'failed';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
