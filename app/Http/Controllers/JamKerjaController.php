<?php

namespace App\Http\Controllers;

use App\JamKerja;
use App\Helper;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JamKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JamKerja = JamKerja::orderBy('id_jam_kerja', 'ASC')->paginate(10);
        return view('jamkerja.index', ['jamkerjas' => $JamKerja]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jamkerja.add');
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
            'keterangan'            => 'required|unique:jam_kerja',
            'jam_masuk'             => 'required',
            'jam_pulang'            => 'required',
            'jam_mulai_istirahat'   => 'required',
            'jam_selesai_istirahat' => 'required',
            'tanggal_mulai'         => 'required',
            'tanggal_akhir'         => 'required',
            'hari_kerja'            => 'required',
        ]);
  
        $data = new JamKerja;
        $data->keterangan            = $request->keterangan;
        $data->jam_masuk             = $request->jam_masuk;
        $data->jam_pulang            = $request->jam_pulang;
        $data->jam_mulai_istirahat   = $request->jam_mulai_istirahat;
        $data->jam_selesai_istirahat = $request->jam_selesai_istirahat;
        $data->tanggal_mulai         = $request->tanggal_mulai;
        $data->tanggal_akhir         = $request->tanggal_akhir;
        $data->toleransi             = Helper::jam_min($request->toleransi);
        $data->default               = 'n';
        $data->hari_kerja            = implode(',',$request->hari_kerja);
        $data->save();
        return redirect()->route('jam-kerja.index')->with('success','Berhasil menambahkan jam kerja : ' . $request->keterangan );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JamKerja  $jamKerja
     * @return \Illuminate\Http\Response
     */
    public function show(JamKerja $jamKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JamKerja  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = JamKerja::findOrFail($id);
        return view('jamkerja.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = JamKerja::findOrFail($id);

        if($request->default=='n'){
            $this->validate($request, [
                'keterangan' => [
                    'required',
                    Rule::unique('jam_kerja')->ignore($id,'id_jam_kerja')
                ],
                'jam_masuk'             => 'required',
                'jam_pulang'            => 'required',
                'jam_mulai_istirahat'   => 'required',
                'jam_selesai_istirahat' => 'required',
                'tanggal_mulai'         => 'required',
                'tanggal_akhir'         => 'required',
                'hari_kerja'            => 'required',
            ]);
        
            $data->tanggal_mulai         = $request->tanggal_mulai;
            $data->tanggal_akhir         = $request->tanggal_akhir;
        }elseif($request->default=='y'){
            $this->validate($request, [
                'jam_masuk'             => 'required',
                'jam_pulang'            => 'required',
                'jam_mulai_istirahat'   => 'required',
                'jam_selesai_istirahat' => 'required',
                'hari_kerja'            => 'required',
            ]);
        }
  
        $data->keterangan            = $request->keterangan;
        $data->jam_masuk             = $request->jam_masuk;
        $data->jam_pulang            = $request->jam_pulang;
        $data->jam_mulai_istirahat   = $request->jam_mulai_istirahat;
        $data->jam_selesai_istirahat = $request->jam_selesai_istirahat;
        $data->toleransi             = Helper::jam_min($request->toleransi);
        $data->default               = $request->default;
        $data->hari_kerja            = implode(',',$request->hari_kerja);
        $data->save();
        return redirect()->route('jam-kerja.index')->with('success','Berhasil mengubah jam kerja : ' . $request->keterangan );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JamKerja  $jamKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jamKerja = JamKerja::findOrFail($id);
        $jamKerja->delete();
        return redirect()->route('jam-kerja.index')->with('success','Berhasil Menghapus Jadwal Kerja');
    }
}
