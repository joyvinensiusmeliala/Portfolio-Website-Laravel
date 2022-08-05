<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Str;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job=Job::orderBy('id','DESC')->paginate();
        return view('backend.job.index')->with('jobs',$job);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.job.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'nama_pekerjaan'=>'required|string',
            'nama_perusahaan'=>'required|string'

        ]);
        $data=$request->all();
        $status=Job::create($data);
        if($status){
            request()->session()->flash('success','Job Successfully added');
        }
        else{
            request()->session()->flash('error','Please try again!!');
        }
        return redirect()->route('job.index');
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
        $job=Job::find($id);
        if(!$job){
            request()->session()->flash('error','Job not found');
        }
        return view('backend.job.edit')->with('job',$job);
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
        $job=Job::find($id);
        $this->validate($request,[
            'nama_pekerjaan'=>'string|required',
            'nama_perusahaan'=>'string|required'
        ]);
        $data=$request->all();

        $status=$job->fill($data)->save();
        if($status){
            request()->session()->flash('success','Job successfully updated');
        }
        else{
            request()->session()->flash('error','Error, Please try again');
        }
        return redirect()->route('job.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job=Job::find($id);
        if($job){
            $status=$job->delete();
            if($status){
                request()->session()->flash('success','Job successfully deleted');
            }
            else{
                request()->session()->flash('error','Error, Please try again');
            }
            return redirect()->route('job.index');
        }
        else{
            request()->session()->flash('error','Job not found');
            return redirect()->back();
        }
    }
}
