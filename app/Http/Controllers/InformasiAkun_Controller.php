<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class InformasiAkun_Controller extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user'] = User::where('id',$id)->first();     
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
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'password' => 'required',
        ]);
        $validatedData['password'] = Crypt::encryptString($validatedData['password']);
        if ($request->hasfile('gambar')) {
            $name = time() . rand(1, 100) . '.' . $request->file('gambar')->extension();
            $request->file('gambar')->move(public_path('gambar'), $name);
            $validatedData = array_merge($validatedData,['gambar'=>$name]);
        }
        $post = User::where('id',$id)->update($validatedData);

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
