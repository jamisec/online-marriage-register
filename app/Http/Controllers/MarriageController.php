<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarriageController extends Controller
{
    public function register(){
        return view('admin.pages.bride_groom');
    }
    
    public function postRegister(Request $request){
        $request->validate([
            "groom_nid"=>'required',
            "groom_name"=>'required',
            "groom_father_name"=>'required',
            "groom_mother_name"=>'required',
            "groom_dob"=>'required',
            "prev_wife"=>'required',
            "prev_wife_nid"=>'required',

            "bride_nid"=>'required',
            "bride_name"=>'required',
            "bride_father_name"=>'required',
            "bride_mother_name"=>'required',
            "bride_dob"=>'required',
            "prev_hus"=>'required',
            "prev_hus_nid"=>'required',
        ]);
        $s1=$request->session()->get('groom_nid',$request->groom_nid);
        $s2=$request->session()->get('bride_nid',$request->bride_nid);
    }

    public function witness(Rrquest $request){
        if($request->session()->has('s1','s2')){
            return view('admin.pages.witness');
        }
        return redirect('/govt/kazi/marriage');
    }
}

