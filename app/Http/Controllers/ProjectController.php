<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Project;
use App\Models\Project;
use Illuminate\Support\Str;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project=Project::orderBy('id','DESC')->paginate();
        return view('backend.project.index')->with('projects',$project);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.project.create');
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
        $status=Project::create($data);
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
        $project=Project::find($id);
        if(!$project){
            request()->session()->flash('error','Project not found');
        }
        return view('backend.project.edit')->with('project',$project);
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
        $project=Project::find($id);
        $this->validate($request,[
            'nama_project'=>'string|required',
            'penyelenggara'=>'string|required',
            'deskripsi'=>'string|required',
            'lokasi'=>'string|required',
            'tools'=>'string',
            'sebagai'=>'string|required',
            'start_project'=>'date',
            'end_project'=>'date'
            // 'photo'=>'string|nullable'
        ]);
        $data=$request->all();

        $status=$project->fill($data)->save();
        if($status){
            request()->session()->flash('success','Project successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project=Project::find($id);
        if($project){
            $status=$project->delete();
            if($status){
                request()->session()->flash('success','Project successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('project.index');
        }
        else{
            request()->session()->flash('error','pekerjaan not found');
            return redirect()->back();
        }
    }
}
