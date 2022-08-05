<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Project;
use App\Models\Portfolio;
use Illuminate\Support\Str;
class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio=Portfolio::orderBy('id','DESC')->paginate();
        return view('backend.portfolio.index')->with('portfolios',$portfolio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.portfolio.create');
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
            'nama_project'=>'string|required',
            'penyelenggara'=>'string|required',
            'deskripsi'=>'string|required',
            'tools'=>'string|required',
            'sebagai'=>'string|required',
            'lokasi'=>'string|required',
            'photo'=>'string',
            'start_project'=>'date',
            'end_project'=>'date'
            // 'photo'=>'string|nullable'
        ]);
        $data=$request->all();
        // $slug=Str::slug($request->title);
        // $count=Project::where('slug',$slug)->count();
        // if($count>0){
        //     $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        // }
        // $data['slug']=$slug;
        // return $data;
        $status=Portfolio::create($data);
        if($status){
            request()->session()->flash('success','Project successfully created');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('project.index');
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
        $portfolio=Portfolio::find($id);
        if(!$portfolio){
            request()->session()->flash('error','Portfolio not found');
        }
        return view('backend.portfolio.edit')->with('project',$portfolio);
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
        $portfolio=Portfolio::find($id);
        $this->validate($request,[
            'nama_project'=>'string|required',
            'penyelenggara'=>'string|required',
            'deskripsi'=>'string|required',
            'lokasi'=>'string|required',
            'tools'=>'string',
            'sebagai'=>'string|required',
            'photo'=>'string',
            'start_project'=>'date',
            'end_project'=>'date'
            // 'photo'=>'string|nullable'
        ]);
        $data=$request->all();

        $status=$portfolio->fill($data)->save();
        if($status){
            request()->session()->flash('success','Portfolio successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio=Portfolio::find($id);
        if($portfolio){
            $status=$portfolio->delete();
            if($status){
                request()->session()->flash('success','Portfolio successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('portfolio.index');
        }
        else{
            request()->session()->flash('error','Portfolio not found');
            return redirect()->back();
        }
    }
}
