<?php

namespace App\Http\Controllers;

use Request;
use App\KategoriLembur;
use App\Pegawai;
use App\LemburPegawai;
use App\Http\Requests;
use Validator;
use Input;

class LemburPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lemburpegawai = LemburPegawai::all();
        return view('lemburpegawai.index', compact('lemburpegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai=Pegawai::all();
        $kategorilembur=KategoriLembur::all();
        return view('lemburpegawai.create',compact('pegawai','kategorilembur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['kode_lembur_id'=>'required|unique:lembur_pegawais',
                'pegawai_id'=>'required',
                'jumlah_jam'=>'required'];
        $message=['kode_lembur_id.required'=>'Kolom Jangan Sampai Kosong',
                'kode_lembur_id.unique'=>'Kode Yang Anda Masukan Sudah Ada',
                'pegawai_id.required'=>'Kolom Jangan Sampai Kosong',
                'jumlah_jam.required'=>'Kolom Jangan Sampai Kosong'];
      $validator=Validator::make(Input::all(),$rules,$message);

        if ($validator->fails())
         {
            # code...
            return redirect('/lemburpegawai/create')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
                $lemburpegawai=Request::all();
                LemburPegawai::create($lemburpegawai);
                return redirect('lemburpegawai');
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
        //
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
