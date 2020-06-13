<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::paginate(10);
        return view('jabatan.index', ['jabatans' => $jabatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.add');
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
            'nama_jabatan' => 'required|unique:jabatan',
        ]);
  
        $data = new Jabatan;
        $data->nama_jabatan = $request->nama_jabatan;
        $data->save();
  
        return redirect()->route('jabatan.index')->with('success','Berhasil menambahkan jabatan : ' . $request->nama_jabatan );
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
        $data = Jabatan::findOrFail($id);

        return view('jabatan.edit',['jabatan' => $data]);
  
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
            'nama_jabatan' => [
                'required',
                Rule::unique('jabatan')->ignore($id,'id_jabatan')
            ],
        ]);
  
        $data = Jabatan::find($id);
        $data->nama_jabatan = $request->nama_jabatan;
        $data->save();
  
        return redirect()->route('jabatan.index')->with('success','Berhasil mengubah jabatan : ' . $request->nama_jabatan );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatan.index')->with('success','Berhasil Menghapus Jabatan');
    }

}
