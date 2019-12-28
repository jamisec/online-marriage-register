<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nid;
use App\User;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Devfaysal\BangladeshGeocode\Models\Upazila;

use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class KaziController extends Controller 
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kazis=User::where('role',1)->paginate(15);
        return view('super_admin.pages.Kazi.index')->with('kazis',$kazis);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions=Division::all();
        return view('super_admin.pages.Kazi.create')->with(['divisions'=>$divisions]);
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
            'password'=>'required|min:5',
            'email'=>'required|unique:users',
            'img'=>'required',
            'district'=>'required',
            'division'=>'required',
            'upuzilla'=>'required',
            'phone'=>'required'
        ]);
    
        $u=new User();
        $u->name=$request->name;
        $u->email=$request->email;
        $u->password=Hash::make($request->password);
        $u->district=$request->district;
        $u->upuzilla=$request->upuzilla;
        $u->division=$request->division;
        $u->phone=$request->phone;
        $u->role='1';
        $u->reg='10003'.time();
        $img=Image::make($request->file('img'));
        $n=time(). '.'.$request->file('img')->getClientOriginalExtension();
        $img->save($n);
        $u->img=$n;
        $u->save();

        return redirect('/govt/kazis/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$id)
    {
        $kazi=$user->where('role','1')->find($id)->first();
        return view('super_admin.pages.Kazi.show')->with(['kazi'=>$kazi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user,$id)
    {

        $divisions=Division::all();
        $kazi=$user->where('role','1')->find($id)->first();
        return view('super_admin.pages.Kazi.edit')->with(['divisions'=>$divisions,'kazi'=>$kazi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $kazi)
    {
        $request->validate([
           
            'district'=>'required',
            'division'=>'required',
            'upuzilla'=>'required',
            'phone'=>'required'
        ]);
    
        $kazi->name=$request->name;
        $kazi->email=$request->email;
        $kazi->password=Hash::make($request->password);
        $kazi->district=$request->district;
        $kazi->upuzilla=$request->upuzilla;
        $kazi->division=$request->division;
        $kazi->phone=$request->phone;
        
        if($request->hasFile('img')){
            $img=Image::make($request->file('img'));
            $t=time().'.'.$request->file('img')->getClientOriginalExtension();
            $img->save($t);
            $kazi->img=$t;
        }
        $kazi->save();
        return redirect('/govt/kazis/'.$kazi->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $kazi)
    {
        $kazi->destroy();
        return redirect('/govt/kazis');
    }
}
