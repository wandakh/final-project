<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\makanan;

class MakananController extends Controller
{
    //untuuk menampilkan data keseluruhan
    public function index(){
        $makanans = makanan::paginate(5);
        return view('makanan.index',[
            'data' => $makanans
        ]);
    }
    public function show($id){
        $makanans = makanan::find($id);
        return $makanans;
    }
    // public function show(Makanan $makanan){
    //         return view ('show',compact('makanan'));
    //     }

    public function create(){
        return view('makanan.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'nama_makanan' => 'required',
            'asal_makanan' => 'required',
            'bahan_makanan' => 'required',
            'gambar_makanan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
   
        $input = $request->all();
   
        if ($gambar_makanan = $request->file('gambar_makanan')) {
            $destinationPath = 'gambar_makanan/';
            $profileImage = date('YmdHis') . "." . $gambar_makanan->getClientOriginalExtension();
            $gambar_makanan->move($destinationPath, $profileImage);
            $input['gambar_makanan'] = "$profileImage";
        }

        makanan::create($input);

        return redirect('/makanan')
        ->with('succsess', 'Data created succsessfully');

        // makanan::create([
        //     'nama_makanan'=> $request->nama_makanan,
        //     'asal_makanan' => $request->asal_makanan,
        //     'bahan_makanan' => $request->bahan_makanan,
        //     'gambar_makanan' => $request->gambar_makanan,
        // ]);
        // return redirect ('/makanan');
    }

    // menampilkan view form untuk edit data
    // public function edit(Request $request, $id){
    //     $makanan = makanan::find($id);
    //     return view('makanan.edit',compact('makanan'));
    // }
    public function edit(Request $request, $id){
        $makanans = makanan::find($id);
        return view('makanan.edit',compact('makanans'));
    }

    // // logic mengubah data yang dipilih
    // public function update(Request $request, $id){
    //     $request->validate([
    //         'nama_makanan' =>'required',
    //         'asal_makanan' =>'required',
    //         'bahan_makanan' => 'required',
    //     ]);
    //     $makanans = $request->all();
    //     $makanans = makanan::find($id);
    //     $makanans->update([
    //         'nama_makanan'=>$request->nama_makanan,
    //         'asal_makanan' =>$request->asal_makanan,
    //         'bahan_makanan' => $request->bahan_makanan,
    //         'gambar_makanan' => $request->gambar_makanan,
    //     ]);
    //     return redirect('/makanan');
    // }
    public function update(Request $request, $id){
        $request->validate([
            'nama_makanan',
        ]);
        $makanans = makanan::find($id);
        $makanans->update([
            'nama_makanan' => $request->nama_makanan,
            'asal_makanan' =>$request->asal_makanan,
                    'bahan_makanan' => $request->bahan_makanan,
            'gambar_makanan' => $request->gambar_makanan,

        ]);
        $input = $request->all();
   
        if ($gambar_makanan = $request->file('gambar_makanan')) {
            $destinationPath = 'gambar_makanan/';
            $profileImage = date('YmdHis') . "." . $gambar_makanan->getClientOriginalExtension();
            $gambar_makanan->move($destinationPath, $profileImage);
            $input['gambar_makanan'] = "$profileImage";
        } else{
            unset($input['gambar_makanan']);
        }
        $makanans->update($input);
        return redirect('/makanan');


    }

    // menghapus data
    public function destroy($id){
        $makanans = makanan::find($id);
        $makanans ->delete();
                return redirect('/makanan');

    }
}
