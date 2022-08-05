<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\pendidikan;
use App\Models\Pendidikan;
use Illuminate\Support\Str;
class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikan=Pendidikan::orderBy('id','DESC')->paginate();
        return view('backend.pendidikan.index')->with('pendidikans',$pendidikan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pendidikan.create');
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
            'tempat_pendidikan'=>'string|required',
            'jenjang_pendidikan'=>'string|required',
            'jurusan'=>'string|required',

            'start_pendidikan'=>'date',
            'status'=>'string',
            'end_pendidikan'=>'string',
            'photo'=>'string|nullable'

        ]);
        $data=$request->all();

        $status=Pendidikan::create($data);
        if($status){
            request()->session()->flash('success','pendidikan successfully created');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('pendidikan.index');
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
        $pendidikan=Pendidikan::find($id);
        if(!$pendidikan){
            request()->session()->flash('error','pendidikan not found');
        }
        return view('backend.pendidikan.edit')->with('pendidikan',$pendidikan);
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
        $pendidikan=Pendidikan::find($id);
        $this->validate($request,[
            'tempat_pendidikan'=>'string|required',
            'jenjang_pendidikan'=>'string|required',
            'jurusan'=>'string|required',
            'start_pendidikan'=>'date',
            'status'=>'string',
            'end_pendidikan'=>'string',
            // 'status'=>'string',
            'photo'=>'string|nullable'
            // 'photo'=>'string|nullable'
        ]);
        $data=$request->all();

        $status=$pendidikan->fill($data)->save();
        if($status){
            request()->session()->flash('success','pendidikan successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('pendidikan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendidikan=Pendidikan::find($id);
        if($pendidikan){
            $status=$pendidikan->delete();
            if($status){
                request()->session()->flash('success','pendidikan successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('pendidikan.index');
        }
        else{
            request()->session()->flash('error','pekerjaan not found');
            return redirect()->back();
        }
    }
}
