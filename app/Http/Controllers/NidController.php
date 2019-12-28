<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Nid;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;

class NidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nids=Nid::paginate(15);
        // dd($nids);
        return view('super_admin.pages.nid.index')->with('nids',$nids);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $divisions=Division::all();
        // $districts=District::all();
        // $upuzilas=Upazila::all();
        return view('super_admin.pages.nid.create')->with('divisions',$divisions);
                                                    // ->with('districts',$districts)
                                                    // ->with('upuzilas',$upuzilas)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'name_eng'=>'required',
            'fathers_name'=>'required',
            'mothers_name'=>'required',
            'img'=>'required',
            'district'=>'required',
            'division'=>'required',
            'upuzilla'=>'required',
            'dob'=>'required|date_format:Y-m-d',
            'sex'=>'required'
        ]);

        $nid=new Nid();
        $nid->name=$request->name;
        $nid->name_eng=$request->name_eng;
        $nid->fathers_name=$request->fathers_name;
        $nid->mothers_name=$request->mothers_name;
        $nid->district=$request->district;
        $nid->upuzilla=$request->upuzilla;
        $nid->division=$request->division;
        $nid->dob=$request->dob;
        $nid->sex=$request->sex;
        $nid->num='2019'.time();
        $img=Image::make($request->file('img'));
        $n=time(). '.'.$request->file('img')->getClientOriginalExtension();
        $img->save($n);
        $nid->img=$n;
        $nid->save();
        // dd($nid);
        return redirect('/govt/nids/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nid=Nid::find($id)->first();
        return view('super_admin.pages.nid.show')->with('nid',$nid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $nid=Nid::find($id)->first();
       $divisions=Division::all();

       return view('super_admin.pages.nid.edit')->with(['nid'=>$nid,'divisions'=>$divisions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Nid $nid)
    {
        $request->validate([
            'name'=>'required',
            'name_eng'=>'required',
            'fathers_name'=>'required',
            'mothers_name'=>'required',
            'district'=>'required',
            'division'=>'required',
            'upuzilla'=>'required',
            'dob'=>'required|date_format:Y-m-d',
            'sex'=>'required'
        ]);

        $nid->name=$request->name;
        $nid->name_eng=$request->name_eng;
        $nid->fathers_name=$request->fathers_name;
        $nid->mothers_name=$request->mothers_name;
        $nid->district=$request->district;
        $nid->upuzilla=$request->upuzilla;
        $nid->division=$request->division;
        $nid->dob=$request->dob;
        $nid->sex=$request->sex;
        
        if($request->hasFile('img')){
            $img=Image::make($request->file('img'));
            $n=time(). '.'.$request->file('img')->getClientOriginalExtension();
            $img->save($n);
            $nid->img=$n;
        }
        else{
            $nid->img=$nid->img;
        }
        $nid->save();
        return redirect('/govt/nids/'.$nid->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nid $nid)
    {
        $nid->destroy();
        return redirect('/govt/nids');
    }
}
