<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use Illuminate\Support\Str;
class PekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pekerjaan=Pekerjaan::orderBy('id','DESC')->paginate();
        return view('backend.pekerjaan.index')->with('pekerjaans',$pekerjaan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_pekerjaan'=>'string|required',
            'nama_perusahaan'=>'string|required',
            'job_desc'=>'string|required',
            'start_bekerja'=>'date',
            'end_bekerja'=>'date',
            'lokasi'=>'string|required',
            'photo'=>'string|nullable'
        ]);
        $data=$request->all();
        // return $data;
        $status=pekerjaan::create($data);
        if($status){
            request()->session()->flash('success','Pekerjaan successfully created');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('pekerjaan.index');
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
        $pekerjaan=Pekerjaan::find($id);
        if(!$pekerjaan){
            request()->session()->flash('error','pekerjaan not found');
        }
        return view('backend.pekerjaan.edit')->with('pekerjaan',$pekerjaan);
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
        $pekerjaan=Pekerjaan::find($id);
        $this->validate($request,[
            'nama_pekerjaan'=>'string|required',
            'nama_perusahaan'=>'string|required',
            'job_desc'=>'string',
            'start_bekerja'=>'date',
            'end_bekerja'=>'date',
            'lokasi'=>'string|required',
            'photo'=>'string|nullable'
        ]);
        $data=$request->all();

        $status=$pekerjaan->fill($data)->save();
        if($status){
            request()->session()->flash('success','pekerjaan successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('pekerjaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pekerjaan=Pekerjaan::find($id);
        if($pekerjaan){
            $status=$pekerjaan->delete();
            if($status){
                request()->session()->flash('success','pekerjaan successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('pekerjaan.index');
        }
        else{
            request()->session()->flash('error','pekerjaan not found');
            return redirect()->back();
        }
    }
}
