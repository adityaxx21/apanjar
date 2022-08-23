<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use App\Models\Gambar_item;
use App\Models\Item;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HalamanAdmin_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Item::all();
        $jenis= Jenis::all();

        // return $data;


        return view( 'gkaerror', get_defined_vars());
        // echo $comment->jenis->jenis;
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
            'user_id' => 'required',
            'jenis_id' => 'required',
        ]);
        
        $post = Item::create($validatedData);
        
        if($request->hasfile('gambar'))
         {
            foreach($request->file('gambar') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('gambar'), $name);  
                Gambar_item::create([
                    'gambar'=>$name,
                    'item_id' =>Item::latest()->value('id')
                ]); 
            }
         }

         return redirect('/halaman_admin')
         ->with('success', 'Barang berhasil dihapus');
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
        ]);

        $files = [];
        $delete_id = $request->delete_id;
        foreach ($delete_id as $key => $value) {
            Gambar_item::where('id',$value)->delete();
        }
        $post = Item::where('id',$id)->update($validatedData);
        if($request->hasfile('gambar'))
         {
            foreach($request->file('gambar') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('gambar'), $name);  
                Gambar_item::create([
                    'gambar'=>$name,
                    'item_id' =>$id
                ]); 
            }
         }
        
         return redirect('/halaman_admin')
         ->with('success', 'Barang berhasil diperbarui');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::where('id',$id)->delete();
        // $item->delete();

        // $item = Gambar_item::find($id);
        // $item->delete();

        return redirect('/halaman_admin')
            ->with('success', 'Barang berhasil dihapus');
    }

    public function mail(Request $request)
    {
        $kode  =  $this->generateRandomString(6);
        session()->put('kode',$kode);
        $details = [
            'kode' =>$kode,
        ];
        Mail::to($request->mail)->send(new MyMail($details));

    }

    function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
