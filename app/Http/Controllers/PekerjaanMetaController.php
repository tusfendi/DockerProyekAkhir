<?php

namespace App\Http\Controllers;

use App\PekerjaanMeta;
use App\Helper;
use Illuminate\Http\Request;

class PekerjaanMetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $count = PekerjaanMeta::where('id_pekerjaan', $request->id_pekerjaan)->count();

        $this->validate($request, [
            'nama_meta' => 'required',
        ]);
  
        $data = new PekerjaanMeta;
        $data->nama_meta    = $request->nama_meta;
        $data->id_pekerjaan = $request->id_pekerjaan;
        $data->id_meta      = Helper::convert_id($request->id_pekerjaan).Helper::convert_id($count+1);
        $data->save();

        return redirect('pekerjaan/'.$request->id_pekerjaan)->with('success','Berhasil menambahkan detail pekerjaan : ' . $request->nama_meta );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PekerjaanMeta  $pekerjaanMeta
     * @return \Illuminate\Http\Response
     */
    public function show(PekerjaanMeta $pekerjaanMeta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PekerjaanMeta  $pekerjaanMeta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PekerjaanMeta::findOrFail($id);

        return view('pekerjaanMeta.edit',['pekerjaan' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PekerjaanMeta  $pekerjaanMeta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = PekerjaanMeta::find($id);
        $data->nama_meta = $request->nama_meta;
        $data->save();
  
        return redirect('pekerjaan/'.$request->id_pekerjaan)->with('success','Berhasil mengubah detail pekerjaan : ' . $request->nama_meta );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PekerjaanMeta  $pekerjaanMeta
     * @return \Illuminate\Http\Response
     */
    public function destroy(PekerjaanMeta $pekerjaanMeta)
    {
        //
    }
}
