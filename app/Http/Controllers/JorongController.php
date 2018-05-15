<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jorong;
use App\Nagari;

class JorongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jorongs = Jorong::all();

        return view('admin.jorong.index', compact('jorongs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nagaris = Nagari::pluck('nama', 'id');
        return view('admin.jorong.create', compact('nagaris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nagari_id' => 'required',
            'nama' => 'required',
            'luas_wilayah' => 'required'
        ]);
        $jorongs = new Jorong;

//        dd($request->all());

        $jorongs->create($request->except('_token'));
        toast()->success('Berhasil menambahkan data jorong');
        return redirect()->route('jorongs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jorongs = Jorong::find($id);
        return view('admin.jorong.show', compact('jorongs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jorongs = Jorong::find($id);
        $nagaris = Nagari::pluck('nama', 'id');
        return view('admin.jorong.edit', compact('jorongs', 'nagaris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nagari_id' => 'required',
            'nama' => 'required',
            'luas_wilayah' => 'required'
        ]);

        $jorongs = Jorong::find($id);
        $jorongs->nagari_id = $request->input('nagari_id');
        $jorongs->nama = $request->input('nama');
        $jorongs->luas_wilayah = $request->input('luas_wilayah');

        if ($jorongs->save()) {
            toast()->success('Berhasil memperbaharui data jorong');
            return redirect()->route('jorongs.index');
        } else {
            toast()->error('Data jorong tidak dapat diperbaharui');
            return redirect()->route('jorongs.edit', ['id' => $jorongs->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jorongs = Jorong::find($id);
        $jorongs->delete();
        toast()->success('Data jorong berhasil dihapus');

        return redirect()->route('jorongs.index');
    }
}
