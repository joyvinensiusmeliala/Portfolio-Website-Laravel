<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Project;
use App\Models\SkillProgramming;
use Illuminate\Support\Str;
class SkillProgrammingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skillprogramming=SkillProgramming::orderBy('id','DESC')->paginate();
        return view('backend.skillprogramming.index')->with('skill_programmings',$skillprogramming);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.skillprogramming.create');
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
            'nama_skill'=>'string|required',
            'level'=>'string|required',
            'photo'=>'string'
            
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
        $status=SkillProgramming::create($data);
        if($status){
            request()->session()->flash('success','Project successfully created');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('skillprogramming.index');
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
        $skillprogramming=SkillProgramming::find($id);
        if(!$skillprogramming){
            request()->session()->flash('error','Skill Programming not found');
        }
        return view('backend.skillprogramming.edit')->with('skillprogramming',$skillprogramming);
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
        $skillprogramming=SkillProgramming::find($id);
        $this->validate($request,[
            'nama_skill'=>'string|required',
            'level'=>'string|required',
            'photo'=>'string'
            
            // 'photo'=>'string|nullable'
        ]);
        $data=$request->all();

        $status=$skillprogramming->fill($data)->save();
        if($status){
            request()->session()->flash('success','Skill Programming successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('skillprogramming.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skillprogramming=SkillProgramming::find($id);
        if($skillprogramming){
            $status=$skillprogramming->delete();
            if($status){
                request()->session()->flash('success','Skill Programming successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('skillprogramming.index');
        }
        else{
            request()->session()->flash('error','Skill Programming not found');
            return redirect()->back();
        }
    }
}
