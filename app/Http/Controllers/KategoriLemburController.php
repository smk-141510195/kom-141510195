<?php

namespace App\Http\Controllers;

use Request;
use App\KategoriLembur;
use App\Golongan;
use App\Jabatan;
use App\Http\Requests;
use Validator;
use Input;
class KategoriLemburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorilembur = KategoriLembur::all();
        return view('kategorilembur.index', compact('kategorilembur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan=Jabatan::all();
        $golongan=Golongan::all();
        return view('kategorilembur.create',compact('jabatan','golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=['kode_lembur'=>'required|unique:kategory_lemburs',
                'jabatan_id'=>'required',
                'golongan_id'=>'required',
                'besaran_uang'=>'required'];
        $message=['kode_lembur.required'=>'Kolom Jangan Sampai Kosong',
                'kode_lembur.unique'=>'Kode Yang Anda Masukan Sudah Ada',
                'jabatan_id.required'=>'Kolom Jangan Sampai Kosong',
                'golongan_id.required'=>'Kolom Jangan Sampai Kosong',
                'besaran_uang.required'=>'Kolom Jangan Sampai Kosong'];
      $validator=Validator::make(Input::all(),$rules,$message);

        if ($validator->fails())
         {
            # code...
            return redirect('/kategorilembur/create')
            ->withErrors($validator)
            ->withInput();
        }
        else
        {
                $kategorilembur=Request::all();
                KategoriLembur::create($kategorilembur);
                return redirect('kategorilembur');
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
